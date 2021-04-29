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
   * @return \DI\Model\Person
   */
  public function current() {
    return $this->container[$this->position];
  }
}
