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
    public function orderByKey(string $key) : void;

    /**
     * Was the order changed between the last access of the Group store?
     * This can be used for integrity checks of the group
     * @return bool
     */
    public function orderChanged() : bool;

    /**
     * @return string
     */
    public function orderCursorLocation() : string;

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
     * @param Closure $orderingCallback
     * @return OrderedGroup
     */
    public function orderedMap(Closure $orderingCallback): OrderedGroup;
}
