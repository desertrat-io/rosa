<?php


namespace Rosa\Collections\Data;

use Rosa\Interfaces\Exception\RosaException;

/**
 * Class StringGroup
 * @package Rosa\Collections\Data
 */
class StringGroup extends TypedGroup
{
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

    protected function getParameterizedType()
    {
        // TODO: Implement getParameterizedType() method.
    }


}
