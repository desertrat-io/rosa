<?php

declare(strict_types=1);

namespace Rosa\Core\App;

use Rosa\Collections\Data\TypedGroup as BootableGroup;

/**
 * Class Rosa
 *
 * @package Rosa\Core\App
 * @author  Mike Lawson <mike@desertrat.io>
 * @license MIT https://github.com/desertrat-io/rosa/blob/master/LICENSE.txt
 */
final class Rosa
{

    /**
     * Group of all bootables that have been registered in core
     * and in userland config files
     *
     * @var BootableGroup<Bootable>
     */
    private BootableGroup $bootables;

    /**
     * @param  string|null  $sessionId
     */
    public static function sessionStart(?string $sessionId = null): void
    {
    }

    /**
     * @param  string|null  $sessionId
     */
    public static function sessionEnd(?string $sessionId = null): void
    {
    }

    /**
     * All bootable items are called first, but only after
     * certain core modules are loaded to make them usable
     * Bootables expose various services within Rosa.
     * Services are just components that hook in to the Rosa main
     * bus. They can take advantage of the container, receive requests, and
     * interact with other components in an indirect and abstract fashion
     *
     * @return void
     */
    public static function boot(): void
    {
    }


    /**
     * Free up any held resources that were present
     * during the request and still exist inside the container
     * or elsewhere in the core. Flush the bus too.
     *
     * @return void
     */
    public static function shutDown(): void
    {
    }

    /**
     * After all is said and done, terminate the request completely.
     * All non essential items are
     * destroyed, the last events fire,
     * and any non explicitly persistent connections are gone.
     * The verification of such is the main purpose of this method.
     *
     * @return void
     */
    public static function terminate(): void
    {
    }

    private function __construct()
    {
    }
}
