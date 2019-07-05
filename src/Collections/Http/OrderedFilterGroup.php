<?php


namespace Rosa\Collections\Http;

use Rosa\Collections\Data\TypedGroup;
use Rosa\Collections\Structures\OrderedGroup;
use Rosa\Interfaces\Filter\Filter;

/**
 * Class OrderedFilterGroup
 * @package Rosa\Collections\Http
 */
class OrderedFilterGroup extends TypedGroup implements OrderedGroup
{

    /**
     * @var string
     */
    protected $typeName = Filter::class;

    protected function getParameterizedType()
    {
        return $this->typeName;
    }
}
