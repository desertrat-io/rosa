<?php


namespace Rosa\Interfaces\Request;

use Rosa\Interfaces\Request\Request;
use Rosa\Collections\Http\OrderedFilterGroup;
use Rosa\Collections\Http\RequestPayload;
use Rosa\Interfaces\Filter\Filter;

/**
 * Class AbstractCloudRequest
 * @package Rosa\Interfaces\Request
 */
abstract class AbstractCloudRequest implements Request
{
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

    public function method(): ?string
    {
        // TODO: Implement method() method.
    }

    public function protocol(): string
    {
        // TODO: Implement protocol() method.
    }

    public function secure(): bool
    {
        // TODO: Implement secure() method.
    }

    public function ip(): string
    {
        // TODO: Implement ip() method.
    }
}
