<?php


namespace Rosa\Subsystem\Data\Adapters\Controllers;

use Rosa\Collections\Data\Group;
use Rosa\Collections\Data\TypedGroup;

/**
 * Facilitates the movement of storage objects for a given storage system
 * Class StorageController
 * @package Rosa\Subsystem\Data\Adapters\Controllers
 */
interface StorageController
{

    /**
     * Persist the object in storage, similar to a save in an ORM except
     * this is far more generic and abstract. This could be passed on to an ORM, could not.
     * who knows. Gets a locator back for whatever a client might need to do with the newly
     * stored object. Optionally takes an existing StorableLocator object to store
     * the object via another object with more concise setup.
     * @param Storable $storable
     * @param StorableLocator $storableLocator
     * @return StorableLocator
     */
    public function persist(Storable $storable, ?StorableLocator $storableLocator): StorableLocator;

    public function remove(Storable $storable): bool;

    public function append(Storable $storable, Storable $appends): Storable;

    public function move(Storable $storable, ?StorableLocator $storableLocator): void;

    public function permissions(Storable $storable, string $permissionString): void;

    public function rename(Storable $storable, string $newName): void;

    public function list(?StorableLocator $storableLocator): TypedGroup;

    public function get(?StorableLocator $storableLocator): Storable;

    public function meta(): Group;

    public function mountedTo(): string;
}
