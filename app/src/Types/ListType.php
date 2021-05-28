<?php


namespace DI\Types;


use ArrayAccess;
use Countable;
use Exception;
use SeekableIterator;

class ListType implements ArrayAccess, SeekableIterator, Countable  /*Serializable*/
{
    use TArrayAccess;
    use TCountable;
    use TSeekable;
    use TIterator;

    /**
     * @var string
     */
    protected $T;

    /**
     * @var array
     */
    protected $container;

    /**
     * ListType constructor.
     * @param null $T
     * @throws Exception
     */
    public function __construct($T = NULL)
    {
        if (class_exists($T) === FALSE) {
            throw new Exception();
        }

        $this->T = $T;

        $this->container = [];
    }

    /**
     * @param mixed $value
     * @throws Exception
     */
    public function typeTest(mixed $value): void
    {
        if ($value instanceof $this->T === FALSE) {
            throw new Exception("isn't type of {$this->T}");
        }
    }
}
