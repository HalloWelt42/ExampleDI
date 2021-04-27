<?php


namespace DI\types;

use OutOfBoundsException;

trait TSeekable
{
  /**
   * @param int $position
   */
  public function seek( $position ):void
  {
    if (!isset($this->array[$position])) {
      throw new OutOfBoundsException("invalid seek position ({$position})");
    }

    $this->position = $position;
  }
}
