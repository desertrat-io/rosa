<?php


namespace Rosa\Subsystem\Data\Adapters\Cloud;

use Rosa\Collections\Data\Jsonable;
use Rosa\Subsystem\Data\Adapters\Controllers\Storable;
use Rosa\Subsystem\Data\Bus\DataSymbol;
use Rosa\Subsystem\Data\Manage\Acl;

/**
 * Class BlockStorable
 * @package Rosa\Subsystem\Data\Adapters\Cloud
 */
interface BlockStorable extends Storable
{

    /**
     * Creates and returns a publicly accessible url for a blocked stored resource
     * or null if one does not exist or is not available at call time
     * @return string|null
     */
    public function url(): ?string;

    /**
     * Whether or not a resource is publicly available in the first place
     * @return bool
     */
    public function isPublic(): bool;

    /**
     * If this block storage is a container, this will set the permissions for that
     * container and optionally all objects that are descendents of that container
     * @param  string  $container
     * @param  int  $permission
     * @param  bool  $recursive
     * @return mixed
     */
    public function setObjectContainerPermissions(string $container, int $permission, bool $recursive = false);

    /**
     * Set the permissions for an individual object via ACL
     * @param  Acl  $acl
     * @return mixed
     */
    public function setObjectPermissions(Acl $acl);

    /**
     * Set the permissions for a given object by passing in the uri to that object
     * instead of a locator
     * TODO: is this needed to be here?
     * @param  string  $uri
     * @param  Acl  $acl
     * @return mixed
     */
    public function setObjectPermissionsByUri(string $uri, Acl $acl);

    /**
     * Return the object casted to some other format determined by
     * the implementation.
     * @param  string  $classToCastTo
     * @param  bool  $always
     * @return mixed
     */
    public function castObjectTo(string $classToCastTo, bool $always = false);

    /**
     * Encrypt the content of the object, or the objects in a container if the
     * object is of that type
     * @return mixed
     */
    public function encryptObject();

    /**
     * Add a descriptive tag to the block object
     * @param  string  $tag
     */
    public function addTag(string $tag): void;

    /**
     * Get the list of tags that have been added
     * @return array
     */
    public function tags(): array;

    /**
     * Return a symbol key for this object to be referenced later on the bus
     * @return DataSymbol
     */
    public function getAsSymbol(): DataSymbol;

    /**
     * If a client wants to, they can set options for this storable to accommodate
     * any block storage provider specific options
     * @param  Jsonable  $optionsJson
     */
    public function setCustomOptions(Jsonable $optionsJson): void;
}
