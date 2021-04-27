<?php


namespace DI\model;


use DI\types\ListType;
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
   * @return \DI\model\Person
   */
  public function current() {
    return $this->container[$this->position];
  }

}
