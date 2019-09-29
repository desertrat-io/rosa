<?php


namespace Rosa\Subsystem\Data\Adapters\Controllers;

use Rosa\Subsystem\Data\Adapters\Cloud\BlockStorable;
use Rosa\Subsystem\Data\Adapters\Cloud\CloudDatabaseStorable;
use Rosa\Subsystem\Data\Adapters\Cloud\ComputeStorable;
use Rosa\Subsystem\Data\Adapters\Controllers\StorageController as Controller;

/**
 * Class CloudStorageController
 * @package Rosa\Subsystem\Data\Adapters\Controllers\Cloud
 */
abstract class CloudController implements Controller
{

    /**
     * The name of the cloud provider, such as Amazon, Rackspace, etc
     * @return string
     */
    abstract public function getProviderName(): string;

    /**
     * If available, the hosting region this controller manages storables in, such a us-east-1 in AWS
     * @return string|null
     */
    abstract public function getRegionSetting(): ?string;

    /**
     * Used to place a block enabled storable in to block storage, like s3
     * @param  BlockStorable  $storable
     */
    abstract public function saveToBlockStorage(BlockStorable $storable): void;

    /**
     * Used to place a compute instance storable on some kind of compute instance, like EC2
     * @param  ComputeStorable  $storable
     */
    abstract public function saveToComputeInstance(ComputeStorable $storable): void;

    /**
     * Used to place a cloud database storable in a cloud service  based
     * database system, such as Dynamo
     * @param  CloudDatabaseStorable  $storable
     */
    abstract public function saveToCloudDatabase(CloudDatabaseStorable $storable): void;

}
