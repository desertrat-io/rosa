<?php


namespace Rosa\Subsystem\Data\Adapters\Controllers;

/**
 * Class Storable
 * @package Rosa\Subsystem\Data\Adapters\Controllers
 */
interface Storable
{

    /**
     * Return the contents of the storable in whatever format is appropriate
     * for the given type. This could be a typed group, some thing to be cast, text, binary
     * or anything in between
     * @return mixed
     */
    public function content();

    /**
     * Associate this storable with a storable locator that has
     * no storable associated with it
     * @param  StorableLocator  $storableLocator
     */
    public function setLocator(StorableLocator $storableLocator): void;

    /**
     * Return the locator that represents this storable.
     * By a matter of being, the locator returned would also
     * return the calling storable
     * @return StorableLocator
     */
    public function getPhysicalLocation(): StorableLocator;

    /**
     * Whether or not there is a lock on this storable
     * @return bool
     */
    public function isLocked(): bool;

    /**
     * Return the lock on this storable if there is one
     * @return StorageLock|null
     */
    public function requestLock(): ?StorageLock;

    /**
     * The size of the storable relative to some unit, such as bytes,
     * to be determined by the implementation
     * @return int
     */
    public function size(): int;

    /**
     * The size of the storable in bytes in a serialized format
     * @return int
     */
    public function sizeSerialized(): int;

    /**
     * Is the data contained within the storable able to be encrypted
     * @return bool
     */
    public function encryptable(): bool;

    /**
     * Self destruct, removing the associated locator. Will return an exception
     * if the file is locked, or an ACL prevents the action
     */
    public function delete(): void;

    /**
     * If available, the file extension used by the storable
     * @return string
     */
    public function ext(): string;

    /**
     * If applicable, set the mim type of the storable to any
     * valid RFC 2025 mime type
     * @see https://tools.ietf.org/html/rfc2045
     * @param  string  $validMimeType
     */
    public function setMimeType(string $validMimeType): void;
}
