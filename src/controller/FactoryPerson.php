<?php


namespace DI\controller;


use DI\model\Person;

class FactoryPerson
{

  /**
   * @param $data
   * @return \DI\model\Person
   */
  public function Person( $data ){
    return new Person($data );
  }

}
