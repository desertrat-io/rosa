<?php


namespace Rosa\Subsystem\Data\Adapters\Controllers;

/**
 * Class StorableLocator
 * @package Rosa\Subsystem\Data\Adapters\Controllers
 */
interface StorableLocator
{
    public function getCanonicalLocation(): string;

    public function getPathLocation(): string;

    public function retrieveStorable(): Storable;

    public function getPersistenceScheme(): string;

    public function setLocation(string $location): void;

    public function referenceStorable(Storable $storable): void;

    public function getReferencedStorable(): Storable;

    public function isLocal(): bool;

    public function isCloud(): bool;

    public function isVirtual(): bool;

    public function exists(): bool;
}
