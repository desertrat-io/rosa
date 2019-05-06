<?php


namespace Rosa\Collections\Http;

use Rosa\Collections\Data\RosaTypedGroup;
use Rosa\Collections\Structures\OrderedGroup;
use Rosa\Interfaces\Filter\Filter;

/**
 * Class OrderedFilterGroup
 * @package Rosa\Collections\Http
 */
class OrderedFilterGroup extends RosaTypedGroup implements OrderedGroup
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
