<?php


namespace Rosa\Collections\Http;

use Closure;
use Rosa\Collections\Data\Group;
use Rosa\Collections\Data\TypedGroup;
use Rosa\Collections\Structures\OrderedGroup;
use Rosa\Exceptions\Core\RosaInvalidTypeException;
use Rosa\Interfaces\Exception\RosaException;
use Rosa\Interfaces\Filter\Filter;

/**
 * Class OrderedFilterGroup
 * @package Rosa\Collections\Http
 * @codeCoverageIgnore
 */
class OrderedFilterGroup extends TypedGroup implements OrderedGroup
{
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

    protected function getParameterizedType()
    {
        // TODO: Implement getParameterizedType() method.
    }

    protected function checkType($valueToCheck)
    {
        // TODO: Implement checkType() method.
    }
}
