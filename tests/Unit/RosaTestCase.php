<?php


namespace RosaTest\Unit;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionException;

/**
 * Class RosaTestCase
 * @package RosaTest
 */
class RosaTestCase extends TestCase
{
    /**
     * Sometimes necessary, but not recommended for all purposes
     * @param  $object
     * @param  string  $propertyName
     * @return mixed
     * @throws ReflectionException
     */
    protected function getSingleProperty($object, string $propertyName)
    {
        $reflection = new ReflectionClass($object);
        $property = $reflection->getProperty($propertyName);
        $property->setAccessible(true);
        return $property->getValue($object);
    }

}
