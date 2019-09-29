<?php


namespace Rosa\Subsystem\Data\Adapters\Controllers;

use Rosa\Collections\Data\Group;
use Rosa\Collections\Data\TypedGroup;
use Rosa\Subsystem\Data\Manage\Acl;

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

    /**
     * Destroy the managed storable, throwing an exception if locked, not allowed by ACL
     * or any other failure to be described by the exception
     * @param  StorableLocator  $storableLocator
     */
    public function remove(StorableLocator $storableLocator): void;

    /**
     * Append the contents of one storable to another
     * @param  Storable  $storable
     * @param  Storable  $appends
     * @return Storable
     */
    public function append(Storable $storable, Storable $appends): Storable;

    /**
     * Using the supplied locator, actually perform the storable move
     * @param  Storable  $storable
     * @param  StorableLocator  $storableLocator
     */
    public function move(Storable $storable, StorableLocator $storableLocator): void;

    /**
     * Directly set the correct permissions for the storable
     * @param  Storable  $storable
     * @param Acl $acl
     */
    public function permissions(Storable $storable, Acl $acl): void;

    /**
     * Rename the storable and persist based on that storable's locator
     * @param  Storable  $storable
     * @param  string  $newName
     */
    public function rename(Storable $storable, string $newName): void;

    /**
     * Retrieve a list of typed storables based on a single locator
     * @param  StorableLocator|null  $storableLocator
     * @return TypedGroup
     */
    public function list(StorableLocator $storableLocator): TypedGroup;

    /**
     * Get a single storable based on a locator
     * NOTE: While a storable can return its locator, or a locator can
     * return its storable, it only returns a reference to that object and
     * not the object itself
     * @param  StorableLocator  $storableLocator
     * @return Storable
     */
    public function get(StorableLocator $storableLocator): Storable;

    /**
     * Generic group of implementation specific metadata
     * @return Group
     */
    public function meta(): Group;

    /**
     * The mount which this controller oversees
     * @return string
     */
    public function mountedTo(): string;
}
