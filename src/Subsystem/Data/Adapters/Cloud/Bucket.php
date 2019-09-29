<?php


namespace Rosa\Subsystem\Data\Adapters\Cloud;

use Rosa\Collections\Data\SimpleCollection;
use Rosa\Subsystem\Data\Adapters\Controllers\StorableLocator;
use Rosa\Subsystem\Data\Manage\Acl;

/**
 * Class Bucket
 * @package Rosa\Subsystem\Data\Adapters\Cloud
 */
interface Bucket
{

    /**
     * Destroy a bucket via name. If the second parameter is true
     * the bucket is not actually deleted, however the framework will not
     * respond to requests to access that bucket
     * @param  string  $name
     * @param bool $soft
     */
    public function destroy(string $name, bool $soft = false): void;

    /**
     * Set a base permission for the bucket
     * @param  int  $permission
     * @param  bool  $recursive
     */
    public function setPermission(int $permission, bool $recursive = false): void;

    /**
     * Use an Acl to manage bucket permissions
     * @param  Acl  $acl
     */
    public function setAcl(Acl $acl): void;

    /**
     * Create a new, blank object of either content or container types
     * based on the locator
     * @param  string  $name
     * @param  StorableLocator|null  $storableLocator
     * @return BlockStorable
     */
    public function createObject(string $name, StorableLocator $storableLocator = null): BlockStorable;

    /**
     * Create an object as in @see createObject and return the url instead of the storable instance
     * and for more object oriented control, a locator can be passed as well
     * @param  string  $name
     * @param  StorableLocator|null  $storableLocator
     * @return string
     */
    public function createAndReturnUrl(string $name, StorableLocator $storableLocator = null): string;

    /**
     * Return a storable object via locator
     * @param  StorableLocator  $storableLocator
     * @return BlockStorable
     */
    public function fetchObject(StorableLocator $storableLocator): BlockStorable;

    /**
     * Return a collection of objects based on a collection of locators
     * @param  StorableLocator  ...$storableLocators
     * @return SimpleCollection
     */
    public function getObjects(StorableLocator ...$storableLocators): SimpleCollection;

    /**
     * Return a single object from the bucket via uri, and optionally cast it to a specified class via
     * the full PSR-4 path to that class
     * @param  string  $uri
     * @param  string  $castToClass
     * @return BlockStorable
     */
    public function fetchObjectByUri(string $uri, string $castToClass = ''): BlockStorable;

    /**
     * Return a collection of objects from the bucket based on a collection of uris
     * @param  string  ...$uri
     * @return SimpleCollection
     */
    public function getObjectsByUri(string ...$uri): SimpleCollection;

    /**
     * Delete an object in the bucket via locator
     * @param  StorableLocator  $storableLocator
     */
    public function deleteObject(StorableLocator $storableLocator): void;

    /**
     * Delete an object in the bucket via locator
     * @param  string  $uri
     */
    public function deleteObjectByUri(string $uri): void;


}
