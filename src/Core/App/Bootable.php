<?php

declare(strict_types=1);

namespace Rosa\Core\App;

use Rosa\Collections\Data\TypedGroups\StringGroup;

/**
 * Class Bootable
 * Bootables are created and used after certain parts of core have been loaded:
 * Request ->
 * Injection Rosen ->
 * Attribute Processor ->
 * Event Buffer (for events to be fired at some time in the future) ->
 * I/O connections established ->
 * <b>Bootables</b> ->
 * Session...
 * Bootables should not be used for request filtering, are not intended to,
 * nor is the current request available to a bootable. It's possible to see a bootable
 * as something like a service provider that you might see in Laravel @link https://laravel.com
 *
 * The event buffer and I/O connections are already available by the time the framework gets
 * to the bootables, so they are available for use.
 *
 * @package Rosa\Core\App
 * @author  Mike Lawson <mike@desertrat.io>
 * @license MIT https://github.com/desertrat-io/rosa/blob/master/LICENSE.txt
 */
abstract class Bootable
{
    protected static StringGroup $loadsClasses;
    protected static StringGroup $loadsAttributes;

    protected function bindAttribute(string $attributeClass): void
    {
        self::$loadsAttributes->append($attributeClass);
    }

    protected function bindAttributes(StringGroup $attributeClasses): void
    {
        foreach ($attributeClasses as $attributeClass) {
            $this->bindAttribute($attributeClass);
        }
    }
    /**
     * If a specific cloud adapter is exposed from this bootable,
     * this returns the class path
     *
     * @return string|null
     */
    public function exposesAdapter(): string | null
    {
        return null;
    }

    /**
     * Pre-session items
     *
     * @return void
     */
    abstract public function boots(): void;

    /**
     * Fire the event associated with this bootable on the actual boot
     *
     * @return void
     */
    public function fireBoot(): void
    {
        self::$loadsClasses = new StringGroup();
        self::$loadsAttributes = new StringGroup();
    }

    /**
     * Fire the event associated with this bootable when
     * the booting process is finished
     *
     * @return void
     */
    public function fireBooted(): void
    {
        // TODO implement generic
    }

    /**
     * Fire the event associated with the shutdown process with
     * regards to this bootable
     *
     * @return void
     */
    public function fireShutdown(): void
    {
        // TODO implement generic
    }

    /**
     * Fire the event associated with the termination of all processes
     * with regards to this bootable
     *
     * @return void
     */
    public function fireTerminated(): void
    {
        // TODO implement generic
    }

}
