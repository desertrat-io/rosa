<?php


namespace Rosa\Collections\Data;

/**
 * Class RosaTypedGroup
 * @package Rosa\Collections\Data
 */
abstract class RosaTypedGroup extends Group
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
}
