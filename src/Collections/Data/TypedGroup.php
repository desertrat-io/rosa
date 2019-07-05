<?php


namespace Rosa\Collections\Data;

/**
 * Class TypedGroup
 * @package Rosa\Collections\Data
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


}
