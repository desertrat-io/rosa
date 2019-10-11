<?php


namespace Rosa\Collections\Data;

use Rosa\Interfaces\Exception\RosaException;

/**
 * Class TypedGroup
 * @package Rosa\Collections\Data
 * @codeCoverageIgnore
 */
abstract class TypedGroup extends Group
{
    /**
     * @var null
     */
    protected $typeName;

    abstract protected function getParameterizedType();

    public function getTypeName() : string
    {
        return static::$typeName;
    }

    // TODO: make sure this checks the container first, as the type could be an interface
    public function getNewGroup()
    {
        $newTypeClass = static::getParameterizedType();
        return new $newTypeClass;
    }

    public function current()
    {
        // TODO: Implement current() method.
    }

    public function next()
    {
        // TODO: Implement next() method.
    }

    public function key()
    {
        // TODO: Implement key() method.
    }

    public function valid()
    {
        // TODO: Implement valid() method.
    }

    public function rewind()
    {
        // TODO: Implement rewind() method.
    }

    public function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
    }

    public function offsetGet($offset)
    {
        // TODO: Implement offsetGet() method.
    }

    public function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
    }

    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }

    public function serialize()
    {
        // TODO: Implement serialize() method.
    }

    public function unserialize($serialized)
    {
        // TODO: Implement unserialize() method.
    }

    public function getByIndex(int $index)
    {
        // TODO: Implement getByIndex() method.
    }

    public function getByKey(string $key)
    {
        // TODO: Implement getByKey() method.
    }

    public function append($object, $key = null): void
    {
        // TODO: Implement append() method.
    }

    public function prepend($object, $key = null): void
    {
        // TODO: Implement prepend() method.
    }

    public function insertByIndex(int $index, int $shiftTo = 0): void
    {
        // TODO: Implement insertByIndex() method.
    }

    public function insertByKey(string $key, int $shiftTo = 0): void
    {
        // TODO: Implement insertByKey() method.
    }

    public function map(callable $callback, ?string $groupClassType = null): Group
    {
        // TODO: Implement map() method.
    }

    public function shuffle(): Group
    {
        // TODO: Implement shuffle() method.
    }

    public function reverse(): Group
    {
        // TODO: Implement reverse() method.
    }

    public function setCap(int $num): void
    {
        // TODO: Implement setCap() method.
    }

    public function setSoftCap(int $num): bool
    {
        // TODO: Implement setSoftCap() method.
    }


}
