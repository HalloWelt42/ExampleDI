<?php


namespace DI\Model;


use DI\Types\ListType;
use Exception;

class PersonList extends ListType
{

  /**
   * PersonList constructor.
   * @throws Exception
   */
  public function __construct()
  {
    // Typenfestlegung der Liste auf Personen
    parent::__construct(Person::class);
  }

  /**
   * @return Person
   */
  public function current(): Person
  {
    return $this->container[$this->position];
  }
}
