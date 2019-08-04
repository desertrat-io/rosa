<?php


namespace Rosa\Subsystem\Data\Adapters\Controllers;

/**
 * Class StorageLock
 * @package Rosa\Subsystem\Data\Adapters\Controllers
 */
interface StorageLock
{

    public static function lock(Storable $storable): StorageLock;

    public function unlock(): void;

    public function getLockedStorable(): Storable;

    public function invalidateLock(): void;

    public function copyToUnlocked(): StorableLocator;
}
