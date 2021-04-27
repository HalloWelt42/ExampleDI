<?php


namespace DI\controller;


class PersonSite
{

  private PersonsReader $person_reader;
  private string $html_tpl;


  public function __construct(PersonsReader $person_reader, string $html_tpl)
  {
    $this->person_reader = $person_reader;
    $this->html_tpl = $html_tpl;
    $this->render();
  }

  private function render()
  {

    $html_fragment = '';
    foreach ($this->person_reader->getPersonList() as $person){
      $html_fragment .= '<br />' . PHP_EOL;
      $html_fragment .= "Nr.:{$person->getId()} Vorname:{$person->getFirstName()} Nachname:{$person->getLastName()}";
      $html_fragment .= PHP_EOL;
    }

    $this->html_tpl = str_replace('{PERSONS}' , $html_fragment , $this->html_tpl);

  }

  /**
   * @return string
   */
  public function __toString()
  {
    return $this->html_tpl;
  }

}
