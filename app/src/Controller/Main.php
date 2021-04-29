<?php


namespace DI\Controller;


use DI\Controller\FactoryPerson;
use DI\Controller\PersonSite;
use DI\Controller\PersonsReader;
use DI\Model\PersonList;

class Main
{
    public function __construct()
    {
        // Dependency-Injection-Container ( ohne Abstraktionslayer / Interfacae )
        $di_container = [];

        // Datenquelle der Personen
        $di_container['person_data'] = function () {
            return file_get_contents(__DIR__ . '/../view/person.json');
        };

        // Datenquelle eines Tempates
        $di_container['person_html_tpl'] = function () {
            return file_get_contents(__DIR__ . '/../view/persons.html');
        };

        // Personen Fabrik
        $di_container[FactoryPerson::class] = function () {
            return new FactoryPerson();
        };

        // Personen Liste mit typsicheren Array, welches nur Typen von Person-Klasse annimmt
        $di_container[PersonList::class] = function () {
            return new PersonList();
        };

        // benutzt Fabrik, Liste von Personen und Rohdaten aus JSON-Datei um Personenliste zu erzeugen
        $di_container[PersonsReader::class] = function () use ($di_container) {
            return new PersonsReader(
                $di_container[FactoryPerson::class](),
                $di_container[PersonList::class](),
                $di_container['person_data']()
            );
        };

        // generiert eine HTML-Ansicht
        $di_container[PersonSite::class] = function () use ($di_container) {
            return new PersonSite(
                $di_container[PersonsReader::class](),
                $di_container['person_html_tpl']());
        };

        // Seite die unsere Daten der Personen darstellt,
        // dabei wird __toString()-Methode des Objektes genutzt um Kontext zur Ausgabe herzustellen
        echo $di_container[PersonSite::class]();
    }
}
