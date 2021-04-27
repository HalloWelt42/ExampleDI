<?php


namespace DI\model;


class Person
{

  private string $first_name;
  private string $last_name;
  private int $id;

  public function __construct(array $data)
  {
    foreach ($data as $key => $val) {
      if (property_exists(__CLASS__, $key)) {
        $this->$key = $val;
      }
    }
  }


  /**
   * @return string
   */
  public function getFirstName(): string
  {
    return $this->first_name;
  }

  /**
   * @param string $first_name
   * @return Person
   */
  public function setFirstName(string $first_name): Person
  {
    $this->first_name = $first_name;
    return $this;
  }

  /**
   * @return string
   */
  public function getLastName(): string
  {
    return $this->last_name;
  }

  /**
   * @param string $last_name
   * @return Person
   */
  public function setLastName(string $last_name): Person
  {
    $this->last_name = $last_name;
    return $this;
  }

  /**
   * @return int
   */
  public function getId(): int
  {
    return $this->id;
  }

  /**
   * @param int $id
   * @return Person
   */
  public function setId(int $id): Person
  {
    $this->id = $id;
    return $this;
  }


}
