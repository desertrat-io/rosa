<?php


namespace Rosa\Collections\Data;

use Rosa\Interfaces\Exception\RosaException;

/**
 * The SimpleCollection class is the most basic form of Group, and is the most
 * general purpose, it's basically an enhanced PHP Array.
 * Class SimpleCollection
 * @package Rosa\Collections\Data
 */
class SimpleCollection extends Group
{

    use TraversesGroups;

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

    public function append($object)
    {
        // TODO: Implement append() method.
    }

    public function prepend($object)
    {
        // TODO: Implement prepend() method.
    }

    public function insertByIndex(int $index, int $shiftTo = 0)
    {
        // TODO: Implement insertByIndex() method.
    }

    public function insertByKey(string $key, int $shiftTo = 0)
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

    public function setCap(int $num)
    {
        // TODO: Implement setCap() method.
    }

    public function setSoftCap(int $num): bool
    {
        // TODO: Implement setSoftCap() method.
    }


}
