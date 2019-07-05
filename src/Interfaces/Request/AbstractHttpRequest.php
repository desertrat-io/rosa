<?php


namespace Rosa\Interfaces\Request;

use Rosa\Collections\Data\StringGroup;
use Rosa\Interfaces\Request\Request;
use Rosa\Collections\Data\SimpleCollection;
use Rosa\Collections\Http\OrderedFilterGroup;
use Rosa\Collections\Http\RequestPayload;
use Rosa\Interfaces\Filter\Filter;

/**
 * Class AbstractHttpRequest
 * @package Rosa\Interfaces\Request
 */
abstract class AbstractHttpRequest implements Request
{

    /**
     * The http method for the request, or null if another protocol was used
     * @return string
     */
    public function method() : ?string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * A collection sent with the request, note no response headers will be in this group
     * @return SimpleCollection
     */
    public function headers() : SimpleCollection
    {
        // TODO: implement
    }

    public function getCurrentFilter(): string
    {
        // TODO: Implement getCurrentFilter() method.
    }

    public function addAfterFilter(Filter $filter): OrderedFilterGroup
    {
        // TODO: Implement addAfterFilter() method.
    }

    public function addBeforeFilter(Filter $filter): OrderedFilterGroup
    {
        // TODO: Implement addBeforeFilter() method.
    }

    public function payload(): RequestPayload
    {
        // TODO: Implement payload() method.
    }

    public function protocol(): string
    {
        return 'http';
    }

    public function secure(): bool
    {
        return $_SERVER['HTTPS'] !== '';
    }

    public function ip(): string
    {
        return $_SERVER['REMOTE_ADDR'];
    }

    public function insertAfterFilterAt(Filter $filter, OrderedFilterGroup $orderedFilterGroup, int $location): void
    {
        // TODO: Implement insertAfterFilterAt() method.
    }

    public function insertBeforeFilterAt(Filter $filter, OrderedFilterGroup $orderedFilterGroup, int $location): void
    {
        // TODO: Implement insertBeforeFilterAt() method.
    }

    public function meta(): StringGroup
    {
        // TODO: Implement meta() method.
    }

    abstract public function json() : string;

    abstract public function jsonInput(string $inputName) : string;

    abstract public function formInput(string $inputName) : string;

    abstract public function fileInput(string $inputName);


}
