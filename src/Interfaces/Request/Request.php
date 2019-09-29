<?php


namespace Rosa\Interfaces\Request;

use Rosa\Collections\Data\StringGroup;
use Rosa\Collections\Http\RequestPayload;
use Rosa\Interfaces\Filter\Filter;
use Rosa\Collections\Http\OrderedFilterGroup;

/**
 * Interface Request
 * @package Rosa\Interfaces\Request
 * @codeCoverageIgnore
 */
interface Request
{

    /**
     * Returns the class path of the current filter acting on the request
     * @return string
     */
    public function getCurrentFilter() : string;

    /**
     * Add a filter to be run after the current stage in the request
     * and then return the current ordered filter group, from
     * closest to most distant filter in the chain, what would be the last filter
     * @param Filter $filter
     * @return OrderedFilterGroup
     */
    public function addAfterFilter(Filter $filter) : OrderedFilterGroup;

    /**
     * Add a filter to be run before the current stage in the request
     * and then return the current ordered filter group, from closest
     * to most distant filter in the chain, what would be the first filter
     * @param Filter $filter
     * @return OrderedFilterGroup
     */
    public function addBeforeFilter(Filter $filter) : OrderedFilterGroup;

    /**
     * Remember, objects are pass by ref in php. Anywho, this is very experimental. Under the hood,
     * ordered groups are a kind of linked list, and as such you can insert in to them wherever you'd
     * like, thus being able to add and remove filters on the fly. The location is a numeric index (for now)
     * but will hopefully allow for a named filter to be inserted, then an order
     * In the case of an after filter, the location is the location away from the main request packet
     * after handling.
     * @param Filter $filter
     * @param OrderedFilterGroup $orderedFilterGroup
     * @param int $location
     */
    public function insertAfterFilterAt(Filter $filter, OrderedFilterGroup $orderedFilterGroup, int $location) : void;

    /**
     * Remember, objects are pass by ref in php. Anywho, this is very experimental. Under the hood,
     * ordered groups are a kind of linked list, and as such you can insert in to them wherever you'd
     * like, thus being able to add and remove filters on the fly. The location is a numeric index (for now)
     * but will hopefully allow for a named filter to be inserted, then an order
     * In the case of a before filter, the location is the reverse order from the main request packet.
     * @param Filter $filter
     * @param OrderedFilterGroup $orderedFilterGroup
     * @param int $location
     */
    public function insertBeforeFilterAt(Filter $filter, OrderedFilterGroup $orderedFilterGroup, int $location) : void;

    /**
     * The current requests payload of data including all items
     * @return RequestPayload
     */
    public function payload() : RequestPayload;

    /**
     * Return the application or transport protocol used for the request. This will
     * almost always be HTTP, but we're trying to be flexible here, especially since not all
     * situations are going to use REST apis
     * @return string
     */
    public function protocol() : string;

    /**
     * Returns true based on whether or not the particular request was determined
     * to have been made on a secure channel, relative to the request's context
     * @return bool
     */
    public function secure() : bool;

    /**
     * The ip address of the origin request. What else do you think it would be?
     * It's further down in the network stack we're gonna go as far as TCP/IP goes.
     * Application layer is a crap shoot
     * @return string
     */
    public function ip() : string;

    /**
     * Returns a group of metadata associated with the request
     * In the example of HTTP, this will be headers, cookies, etc.
     * It returns a string group as this data is intended to be string like.
     * Binary data is not part of this, although this data may refer to binary data
     * @return StringGroup
     */
    public function meta() : StringGroup;



}
