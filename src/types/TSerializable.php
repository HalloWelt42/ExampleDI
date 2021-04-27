<?php


namespace DI\types;


trait TSerializable
{

  public function serialize()
  {
    $unserialized = '';
    return (string)$unserialized;
  }

  public function unserialize($serialized)
  {

  }
}
