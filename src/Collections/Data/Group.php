<?php


namespace Rosa\Collections\Data;

use Rosa\Collections\Iterates;
use ArrayAccess;
use Rosa\Collections\Structures\OrderedGroup;
use Rosa\Interfaces\Exception\RosaException;
use Serializable;
use Countable;
use stdClass;


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
 */
abstract class Group implements Iterates, ArrayAccess, Serializable, Countable
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
    protected $collection = [];

    /**
     * @var RosaException
     */
    protected $exceptionHandler;

    /**
     * @var array
     */
    protected $exceptionHandlerArguments = [];

    /**
     * @var int
     */
    protected $cap = 0;

    /**
     * @var int
     */
    protected $softCap = 0;

    /**
     * For native array
     * @return int|null
     */
    public function count(): ?int
    {
        if (static::$collection instanceof Countable) {
            return count(static::$collection);
        }
        return null;
    }

    /**
     * Converts the group to a PHP object with no frills
     * This can be overridden to provide a custom object type
     * @return stdClass
     */
    public function toGenericObject(): stdClass
    {
        $generic = new stdClass();
        if (is_array(static::$collection)) {
            foreach (static::$collection as $key => $val) {
                $generic->{$key} = $val;
            }
        }
        return $generic;
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
        if (is_array(static::$collection) ||
            (static::$collection instanceof ArrayAccess &&
                static::$collection instanceof Countable)) {

            return json_encode(static::$collection);
        }

        return null;
    }

    /**
     * Sets the default exception handler for a group object should client code need to customize this
     * @param RosaException $exceptionHandler
     * @param mixed ...$arguments
     */
    public function setDefaultExceptionHandler(RosaException $exceptionHandler, ...$arguments) {
        $this->exceptionHandler = $exceptionHandler;
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
    abstract public function getByIndex(int $index);

    /**
     * Retrieve an item from the group by associated string key, similar to a native
     * associative array or hash.
     * $myGroup->getByKey('foo') returns the object with key foo (duh)
     * @param string $key
     * @return mixed
     */
    abstract public function getByKey(string $key);

    /**
     * Appends an object to the end of the Group with no order guarantee
     * @param $object
     */
    abstract public function append($object);

    /**
     * Prepends an object to the beginning of the Group with no order guarantee
     * @param $object
     */
    abstract public function prepend($object);

    /**
     * Insert an item in to an array in between the first and last elements
     * If the index of one of the first or last element is specified, will behave
     * the same as prepend or append
     * When an insert happens, the second parameter can be used
     * to define what direction relative to the inserted item should be shifted
     * @param int $index
     * @param int $shiftTo
     */
    abstract public function insertByIndex(int $index, int $shiftTo = 0);

    /**
     * Works the same as @see insertByIndex however it does so by string key
     * @param string $key
     * @param int $shiftTo
     */
    abstract public function insertByKey(string $key, int $shiftTo = 0);

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
    abstract public function setCap(int $num);

    /**
     * Set a limit on how many objects can be stored in a group
     * Returns false if the cap is hit, but no exception is thrown
     * @param int $num
     * @return bool
     */
    abstract public function setSoftCap(int $num): bool;


}
