<?php


namespace Rosa\Subsystem\Data\Adapters\Controllers;

use Rosa\Subsystem\Data\Adapters\Controllers\StorableLocator;
/**
 * Class Storable
 * @package Rosa\Subsystem\Data\Adapters\Controllers
 */
interface Storable
{

    public function setLocator(StorableLocator $storableLocator);

    public function getPhysicalLocation(): StorableLocator;

    public function isLocked(): bool;

    public function requestLock(): ?StorageLock;

    public function requestUnlock(): ?StorageLock;
}
