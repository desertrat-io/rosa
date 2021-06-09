<?php

/**
 * Class RosenRegistry
 *
 * @package Rosa\Core\Rosen
 * @author  Mike Lawson <mike@desertrat.io>
 * @license MIT https://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace Rosa\Core\Rosen;

use ReflectionClass;
use ReflectionException;
use Rosa\Core\Rosen\Exceptions\InvalidRosenClassException;
use Rosa\Core\Rosen\Exceptions\RosenException;

class RosenRegistry
{
    /**
     * @var array<string>
     */
    private static array $attributes = [];

    private function __construct()
    {
    }

    /**
     * We only want the one registry in the framework, as all calls will
     * use the same list
     * @param  string  $rosenAttribute
     * @return void
     */
    public static function register(string $rosenAttribute): void
    {
        self::$attributes[] = $rosenAttribute;
    }

    public static function retrieve(): array
    {
        return self::$attributes;
    }

    /**
     * Resolve a single attribute to its implementing class
     * @param  string  $rosenAttribute
     * @return object|null
     * @throws InvalidRosenClassException
     */
    protected static function resolveAttributeImplementation(string $rosenAttribute): ?object
    {
        try {
            $attributeInstance = new ReflectionClass($rosenAttribute);
            $attributeToCheck = $attributeInstance->getAttributes(Rosen::class)[0]?->newInstance();
            if ($attributeToCheck !== null) {
                $attributeClass = $attributeToCheck->implementedBy;
                return new $attributeClass($attributeToCheck);
            }
        } catch (ReflectionException) {
            throw new InvalidRosenClassException('Could not resolve class: ' . $rosenAttribute);
        }
        return null;
    }
}
