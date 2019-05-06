<?php


namespace Rosa\Interfaces\Storage;

/**
 * Class Storage
 * @package Rosa\Interfaces\Storage
 */
interface Storage
{

    /**
     * The type of storage medium, such as local disk, cloud, block, etc
     * @return string
     */
    public function storageType() : string;
}
