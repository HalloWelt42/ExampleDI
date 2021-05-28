<?php


namespace DI\Controller;


use DI\Model\PersonList;


class PersonsReader
{
    private FactoryPerson $person_factory;
    private PersonList $person_list;
    private array $json_data;

    /**
     * @throws \JsonException
     */
    public function __construct(
        FactoryPerson $person_factory,
        PersonList $person_list,
        string $json
    )
    {
        $this->person_factory = $person_factory;
        $this->person_list = $person_list;
        $this->json_data = json_decode(
            $json,
            true,
            512,
            JSON_THROW_ON_ERROR
        );
        $this->read();
    }

    private function read(): void
    {
        foreach ($this->json_data as $item) {
            $this->person_list[] = $this->person_factory->Person($item);
        }
    }

    /**
     * @return \DI\Model\PersonList
     */
    public function getPersonList(): PersonList
    {
        return $this->person_list;
    }
}
