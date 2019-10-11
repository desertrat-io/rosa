<?php


namespace Rosa\Collections\Data;

use Closure;
use Rosa\Collections\Structures\OrderedGroup;
use Rosa\Interfaces\Exception\RosaException;

/**
 * Class BaseOrderedGroup
 * @package Rosa\Collections\Data
 * @codeCoverageIgnore
 */
class BaseOrderedGroup extends Group implements OrderedGroup
{
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

    public function orderByKey(string $key): void
    {
        // TODO: Implement orderByKey() method.
    }

    public function orderChanged(): bool
    {
        // TODO: Implement orderChanged() method.
    }

    public function orderCursorLocation(): string
    {
        // TODO: Implement orderCursorLocation() method.
    }

    public function setOrderCursor(int $newLocation): void
    {
        // TODO: Implement setOrderCursor() method.
    }

    public function add($item)
    {
        // TODO: Implement add() method.
    }

    public function get($index)
    {
        // TODO: Implement get() method.
    }

    public function orderedMap(Closure $orderingCallback): OrderedGroup
    {
        // TODO: Implement orderedMap() method.
    }

    public function orderedFilter(Closure $orderingCallback): OrderedGroup
    {
        // TODO: Implement orderedFilter() method.
    }

    public function reorderAndClone(Closure $orderingCallback): OrderedGroup
    {
        // TODO: Implement reorderAndClone() method.
    }

    public function union(OrderedGroup ...$orderedGroups): OrderedGroup
    {
        // TODO: Implement union() method.
    }

    public function intersect(OrderedGroup ...$orderedGroups): OrderedGroup
    {
        // TODO: Implement intersect() method.
    }

    public function resetCursor(): void
    {
        // TODO: Implement resetCursor() method.
    }


}
