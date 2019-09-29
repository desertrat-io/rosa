<?php


namespace Rosa\Subsystem\Data\Adapters\Pipeline;

use Rosa\Subsystem\Data\Adapters\Pipeline\Storable;

/**
 * Class StorableLocator
 * @package Rosa\Subsystem\Data\Adapters\Controllers
 */
interface StorableLocator
{

    /**
     * Get the true location of the storable pointed to, such as a cloud service,
     * database, network, anything. This will return a string value equal to whatever the service
     * implementation says
     * @return string
     */
    public function getCanonicalLocation(): string;

    /**
     * Returns a RFC 3986 compliant URI to the managed storable
     * @see https://tools.ietf.org/html/rfc3986
     * @return string
     */
    public function getPathLocation(): string;

    /**
     * Return the storable as an object of type
     * Storable which can be later cast in to the appropriate type
     * @return Storable
     */
    public function retrieveStorable(): Storable;

    /**
     * Hard disk, database, cloud, etc
     * @return string
     */
    public function getPersistenceScheme(): string;

    /**
     * The location at which the locator will put given in the form of a
     * RFC 3986 compliant URI
     * @see https://tools.ietf.org/html/rfc3986
     * @param  string  $location
     */
    public function setLocation(string $location): void;

    /**
     * Bind a Storable to the locator instance for tracking
     * @param  Storable  $storable
     */
    public function referenceStorable(Storable $storable): void;

    /**
     * Return the storable as a shallow reference. Mutating
     * the Storable using this retrieval method will immediately
     * save the result to the storage system. This method is not
     * guaranteed to be fully concurrent
     * @return Storable
     */
    public function getReferencedStorable(): Storable;

    /**
     * Whether or not the storable is local to the client application or filesystem
     * @return bool
     */
    public function isLocal(): bool;

    /**
     * Whether or not the storable is in the cloud via cloud persistence adapters
     * @return bool
     */
    public function isCloud(): bool;

    /**
     * Whether or not the storable is in some virtual space like memory or other
     * non permanent store
     * @return bool
     */
    public function isVirtual(): bool;

    /**
     * Does the referenced storable still exist
     * @return bool
     */
    public function exists(): bool;
}
