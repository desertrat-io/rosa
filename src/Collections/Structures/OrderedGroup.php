<?php


namespace Rosa\Collections\Structures;

use Closure;
/**
 * Class OrderedGroup
 * @package Rosa\Collections\Structures
 */
interface OrderedGroup
{

    /**
     * Useful if the group mutates in some way that affects ordering
     * @param string $key
     */
    public function orderByKey(string $key): void;

    /**
     * Was the order changed between the last access of the Group store?
     * This can be used for integrity checks of the group
     * @return bool
     */
    public function orderChanged(): bool;

    /**
     * @return string
     */
    public function orderCursorLocation(): string;

    /**
     * Set the cursor to point to a new element in the ordered collection. This
     * is to more strictly enforce ordering with these objects instead of just relying on
     * the @see \Iterator interface.
     * @param int $newLocation
     */
    public function setOrderCursor(int $newLocation): void;

    /**
     * Add an item to the end of the collection.
     * Since this collection is ordered, there is no way to
     * set anything at the front.
     * @param $item
     */
    public function add($item);

    /**
     * Retrieve a single item, guaranteed to be in order from the last
     * @param $index
     * @return mixed
     */
    public function get($index);

    /**
     * Received an unordered group, then creates a new ordered group according to the given closure
     * That closure will determine the ordering to see the group with.
     * @param Closure $orderingCallback
     * @return OrderedGroup
     */
    public function orderedMap(Closure $orderingCallback): OrderedGroup;

    /**
     * Perform a filter operation over the group that is guaranteed to be in order
     * @param Closure $orderingCallback
     * @return OrderedGroup
     */
    public function orderedFilter(Closure $orderingCallback): OrderedGroup;


    /**
     * Create an exact copy of the originating group, but reorder it
     * based on the given callback. This allows two identical datasets to be maintained
     * and managed in different orders.
     * @param Closure $orderingCallback
     * @return OrderedGroup
     */
    public function reorderAndClone(Closure $orderingCallback): OrderedGroup;

    /**
     * Perform a union of all passed in OrderedGroups that maintains the order
     * defined in the first group
     * @param OrderedGroup ...$orderedGroups
     * @return OrderedGroup
     */
    public function union(OrderedGroup ...$orderedGroups): OrderedGroup;

    /**
     * Perform an intersection of all passed in OrderedGroups that maintains the order
     * defined in the first group
     * @param OrderedGroup ...$orderedGroups
     * @return OrderedGroup
     */
    public function intersect(OrderedGroup ...$orderedGroups): OrderedGroup;

    /**
     * Reset the cursor to the beginning of the group for linear groups, and to the root
     * for non linear
     */
    public function resetCursor(): void;


}
