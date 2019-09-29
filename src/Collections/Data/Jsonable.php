<?php


namespace Rosa\Collections\Data;

/**
 * Class Jsonable
 * @package Rosa\Collections\Data
 * @codeCoverageIgnore
 */
interface Jsonable
{
    public function toJson(): string;
}
