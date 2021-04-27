<?php


namespace DI\types;


trait TCountable
{

  /**
   * @return int
   */
  public function count(){
    return count($this -> container );
  }
}

