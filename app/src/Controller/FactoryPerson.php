<?php


namespace DI\Controller;


use DI\Model\Person;

class FactoryPerson
{
    /**
     * @param $data
     * @return Person
     */
    public function Person($data): Person
    {
        return new Person($data);
    }
}
