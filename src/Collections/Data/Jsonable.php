<?php


namespace Rosa\Collections\Data;

/**
 * Class Jsonable
 * @package Rosa\Collections\Data
 */
interface Jsonable
{
    public function toJson(): string;
}
