<?php


namespace Rosa\Collections\Data;

use Rosa\Collections\Iterates;
use ArrayAccess;
use Rosa\Collections\Structures\OrderedGroup;
use Rosa\Interfaces\Exception\RosaException;
use Serializable;
use Countable;
use stdClass;
use RuntimeException;
use Error;

/**
 * The Group class is the highest level class in the tree of objects that represents collections of objects
 * While a group can contain scalar values, it is recommended for use with objects. Some implementations of group
 * use a standard PHP array under the hood, while others may choose to opt for something more exotic such as
 * a node tree or linked list.
 *
 * By default, Groups operate almost exactly as a native array would with the addition of some extra features.
 * However other Group implementations exist that may provide a more specialized use for whatever needs client code
 * may have. Any and all groups will and must extend from this abstract class.
 *
 * Groups that guarantee order will not only extend this class, but also implement the OrderedGroup interface.
 * @see OrderedGroup
 *
 * TypedGroups are a separate type of Group that inherit this class and is itself an abstract class
 * @see TypedGroup
 *
 * Class Group
 * @package Rosa\Collections\Data
 * @codeCoverageIgnore
 */
abstract class Group implements Iterates, ArrayAccess, Serializable, Countable, Jsonable
{

    /**
     * @var int
     */
    public const SHIFT_RIGHT = 0;

    /**
     * @var int
     */
    public const SHIFT_LEFT = 1;
    /**
     * For the most basic kinds of groups, a native array is sufficient
     * @var array
     */
    protected array $collection = [];

    /**
     * @var string
     */
    protected string $exceptionHandler;

    /**
     * @var array
     */
    protected array $exceptionHandlerArguments = [];

    /**
     * @var GroupNode
     */
    protected GroupNode $groupNode;

    /**
     * @var int
     */
    protected int $cap = 0;

    /**
     * @var int
     */
    protected int $softCap = 0;

    /**
     * For native array
     * @return int|null
     */
    public function count(): ?int
    {
        if ($this->collection instanceof Countable || is_countable($this->collection)) {
            return count($this->collection);
        }
        return null;
    }

    /**
     * Converts the group to a PHP object with no frills
     * This is meant to be overridden to provide a custom object type
     * @return stdClass
     */
    public function toGenericObject(): stdClass
    {
        return (object) $this->collection;
    }

    public function destroy(): void
    {
        $this->collection = [];
    }

    /**
     * Try to change the group instance in to a json string based on whether or not
     * it can be used as such. If the collection cannot be converted, null is returned
     * or if the collection does match the condition but is invalid in some way, returns the standard
     * php json invalid type
     * @return string|null
     */
    public function json(): ?string
    {
        if (is_array($this->collection) ||
            ($this->collection instanceof ArrayAccess &&
                $this->collection instanceof Countable)) {
            return json_encode($this->collection, JSON_THROW_ON_ERROR, 512);
        }

        return null;
    }

    /**
     * Sets the default exception handler for a group object should client code need to customize this
     * @param string $exceptionHandlerClass
     * @param mixed ...$arguments
     */
    public function setDefaultExceptionHandler(string $exceptionHandlerClass, ...$arguments): void
    {
        $this->exceptionHandler = $exceptionHandlerClass;
        $this->exceptionHandlerArguments = $arguments;
    }

    /**
     * Retrieve an item from the group by numeric index, similar to a native array
     * Negative indexes return items in reverse
     * $myGroup->getByIndex(0) returns the first object in the group
     * $myGroup->getByIndex(-1) returns the last object in the group
     * @param int $index
     * @return mixed
     */
    public function getByIndex(int $index)
    {
        if (isset($this->collection[$index])) {
            return $this->collection[$index];
        }
        return null;
    }

    /**
     * Retrieve an item from the group by associated string key, similar to a native
     * associative array or hash.
     * $myGroup->getByKey('foo') returns the object with key foo (duh)
     * @param string $key
     * @return mixed
     */
    public function getByKey(string $key)
    {
        if (isset($this->collection[$key])) {
            return $this->collection[$key];
        }
        return null;
    }

    /**
     * Appends an object to the end of the Group with no order guarantee
     * @param $object
     * @param  int|string  $key
     * @return void
     * @throws RosaException
     * @throws RuntimeException
     */
    public function append($object, $key = null): void
    {
        $this->checkKey($key);
        if (is_array($this->collection)) {
            if ($key !== null) {
                $this->collection[$key] = $object;
            } else {
                $this->collection[] = $object;
            }
        }
    }

    /**
     * Prepends an object to the beginning of the Group with no order guarantee
     * @param $object
     * @param $key
     * @throws RuntimeException
     * @throws RosaException
     */
    public function prepend($object, $key = null): void
    {
        $this->checkKey($key);
        if (is_array($this->collection)) {
            // PHP scoping let's use define variables inside conditionals, but I find that hard to read
            // this guy is here so that we aren't trying to access the collection during a padding operation
            $tmpCollection = [];
            if ($key !== null) {
                // make a spot
                $tmpCollection = array_merge([$key => $object], $this->collection);
            } else {
                $tmpCollection = array_pad($this->collection, -(count(($this->collection))+1), $object);
            }

            $this->collection = $tmpCollection; // keep the original collection from being touched until finished
        }
    }

    /**
     * Just a simple way to make sure any group key is valid, mainly for internal use
     * @param $key
     * @throws RuntimeException
     * @throws Error
     */
    protected function checkKey($key): void
    {
        if ($key !== null && (!is_string($key) && !is_numeric($key))) {
            if ($this->exceptionHandler !== null) {
                throw new $this->exceptionHandler(...$this->exceptionHandlerArguments);
            }
            throw new RuntimeException('Invalid Key');
        }
    }

    /**
     * Insert an item in to an array in between the first and last elements
     * If the index of one of the first or last element is specified, will behave
     * the same as prepend or append
     * When an insert happens, the second parameter can be used
     * to define what direction relative to the inserted item should be shifted
     * @param int $index
     * @param int $shiftTo
     */
    abstract public function insertByIndex(int $index, int $shiftTo = 0): void;

    /**
     * Works the same as @see insertByIndex however it does so by string key
     * @param string $key
     * @param int $shiftTo
     */
    abstract public function insertByKey(string $key, int $shiftTo = 0): void;

    /**
     * Performs a map action on the Group using the specific callback
     * If the second parameter is given, the returns map is of that type
     * Useful for converting between two group types
     * @param callable $callback
     * @param string|null $groupClassType
     * @return Group
     */
    abstract public function map(callable $callback, ?string $groupClassType = null): Group;

    /**
     * Randomize a Group, similar to php's built in array shuffle
     * @return Group
     */
    abstract public function shuffle(): Group;

    /**
     * Reverse a group, similar to php's array_reverse
     * @return Group
     */
    abstract public function reverse(): Group;

    /**
     * Set a limit on how many objects can be stored in a group
     * Throws an exception if violated
     * @param int $num
     * @throws RosaException
     */
    abstract public function setCap(int $num): void;

    /**
     * Set a limit on how many objects can be stored in a group
     * Returns false if the cap is hit, but no exception is thrown
     * @param int $num
     * @return bool
     */
    abstract public function setSoftCap(int $num): bool;

    /**
     * Create a new Group
     * @return static|Group
     */
    public function init(): Group
    {
        return new static;
    }
}
