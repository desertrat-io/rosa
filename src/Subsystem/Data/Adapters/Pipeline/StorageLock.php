<?php


namespace Rosa\Subsystem\Data\Adapters\Pipeline;

use Rosa\Subsystem\Data\Adapters\Pipeline\Storable;
use Rosa\Subsystem\Data\Adapters\Pipeline\StorableLocator;

/**
 * Class StorageLock
 * @package Rosa\Subsystem\Data\Adapters\Controllers
 */
interface StorageLock
{

    /**
     * Place a high level lock on the resource given making the storable
     * immutable across the managed application
     * @param  Storable  $storable
     * @return StorageLock
     */
    public function lock(Storable $storable): StorageLock;

    /**
     * Unlock the storable managed by this lock object
     */
    public function unlock(): void;

    /**
     * Return the locked storable managed by this lock
     * @return Storable
     */
    public function getLockedStorable(): Storable;

    /**
     * Copy the immutable version of the storable managed by this lock
     * and return the mutable copy
     * @return StorableLocator
     */
    public function copyToUnlocked(): StorableLocator;
}
