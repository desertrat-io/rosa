<?php


namespace Rosa\Subsystem\Data\Adapters\Cloud;

use Rosa\Collections\Data\StringGroup;
use Rosa\Subsystem\Compute\ComputeInstance;
use Rosa\Subsystem\Data\Adapters\Pipeline\Storable;
use Rosa\Subsystem\Compute\InstanceMetaData;
use Rosa\Subsystem\Data\Bus\DataSymbol;

/**
 * Class ComputeStorable
 * @package Rosa\Subsystem\Data\Adapters\Cloud
 */
interface ComputeStorable extends Storable
{

    /**
     * The name of the compute instance to which this storable is found on
     * @return string
     */
    public function instanceName(): string;

    /**
     * The preformed metadata that describes the compute instance on which this storable exists
     * @return InstanceMetaData
     */
    public function instanceMeta(): InstanceMetaData;

    /**
     * Returns whether or not the current storable on the current instance is the canonical object.
     * Useful when dealing with replicating and scaling groups
     * @return bool
     */
    public function isCanonicalCopy(): bool;

    /**
     * Given a compute instance, copy the storable to that instance using
     * an instance handle. Returns the newly updated instance handle as a result
     * @param  ComputeInstance  $computeInstance
     * @return ComputeInstance
     */
    public function copyToInstance(ComputeInstance $computeInstance): ComputeInstance;

    /**
     * If the storable on the instance has a publicly accessible URL
     * @return bool
     */
    public function hasPublicUrl(): bool;

    /**
     * The url of the storable on the instance, or null if one cannot be given
     * @return string|null
     */
    public function getPublicUrl(): ?string;

    /**
     * Add the storable to a group within the instance context, usually
     * a filesystem group
     * @param  DataSymbol  $groupSymbol
     * @param  bool  $createIfNotExists
     */
    public function attachGroup(DataSymbol $groupSymbol, bool $createIfNotExists = true): void;

    /**
     * Return a string typed group of instance groups this storable belongs to
     * @return StringGroup
     */
    public function getGroups(): StringGroup;

    /**
     * If this storable has a specific own on the instance, return it
     * @return string|null
     */
    public function getOwner(): ?string;

    /**
     * Set or change the owner of this storable on the instance to the name given
     * @param  string  $ownerName
     */
    public function changeOwner(string $ownerName): void;

    /**
     * Replicate this storable to equal compute instances that are part of
     * the same scaling group or classification
     * @param  ComputeInstance  ...$computeInstances
     */
    public function replicate(ComputeInstance ...$computeInstances): void;

}
