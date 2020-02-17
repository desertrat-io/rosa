<?php


namespace RosaTest\Unit\Collections\Data;

use Rosa\Collections\Data\Group;
use Rosa\Interfaces\Exception\RosaException;
use RosaTest\Unit\RosaTestCase;
use ReflectionException;
use ReflectionClass;
use stdClass;
use RuntimeException;
use Error;

/**
 * Class GroupTest
 * @package RosaTest\Unit\Collections\Data
 */
class GroupTest extends RosaTestCase
{

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|Group
     */
    private $group;

    public function setUp(): void
    {
        parent::setUp();

        try {
            $this->group = $this->getMockForAbstractClass(Group::class);
        } catch (ReflectionException $reflectionException) {
            $this->fail($reflectionException->getMessage());
        }
    }

    /**
     * @param $first
     * @param $second
     * @param $third
     * @throws RosaException
     * @dataProvider scalarProvider
     */
    public function testCanAddScalars($first, $second, $third): void
    {
        $this->group->append($first);
        $this->group->append($second);
        $this->group->append($third);
        $this->assertSame(3, $this->group->count());
    }

    /**
     * @param $first
     * @param $second
     * @param $third
     * @throws RosaException
     * @dataProvider scalarProvider
     */
    public function testCanPrependScalars($first, $second, $third): void
    {
        $this->group->prepend($first);
        $this->group->prepend($second);
        $this->group->prepend($third);
        $this->assertCount(3, $this->group);
    }

    /**
     * @param $first
     * @param $second
     * @throws RosaException
     * @dataProvider objectProvider
     */
    public function testCanAddObjects($first, $second): void
    {
        $this->group->append($first);
        $this->group->append($second);
        $this->assertSame(2, $this->group->count());
    }

    /**
     * @param $first
     * @param $second
     * @throws RosaException
     * @dataProvider objectProvider
     * @depends testCanAddObjects
     */
    public function testCanPrependObjects($first, $second): void
    {
        $this->group->prepend($first);
        $this->group->prepend($second);
        $this->assertSame(2, $this->group->count());
    }

    /**
     * @param $first
     * @param $second
     * @param $third
     * @throws RosaException
     * @dataProvider scalarProvider
     */
    public function testCanProduceJsonScalar($first, $second, $third): void
    {
        $this->group->append($first);
        $this->group->append($second);
        $this->group->append($third);
        $jsonFromGroup = $this->group->json();
        $this->assertJson($jsonFromGroup, json_encode([$first, $second, $third]));
    }

    /**
     * @param $first
     * @param $second
     * @param $third
     * @throws RosaException
     * @dataProvider scalarProvider
     * @depends testCanProduceJsonScalar
     */
    public function testPrependCanProduceJsonScalar($first, $second, $third): void
    {
        $this->group->prepend($first);
        $this->group->prepend($second);
        $this->group->prepend($third);
        $jsonFromGroup = $this->group->json();
        $this->assertJson($jsonFromGroup, json_encode([$first, $second, $third]));
    }

    /**
     * @param $first
     * @param $second
     * @throws RosaException
     * @dataProvider objectProvider
     */
    public function testCanProduceJsonObject($first, $second): void
    {
        $this->group->append($first);
        $this->group->append($second);
        $jsonFromGroup = $this->group->json();
        $this->assertJson($jsonFromGroup, json_encode([$first, $second]));
    }

    /**
     * @param $first
     * @param $second
     * @throws RosaException
     * @dataProvider objectProvider
     * @depends testCanProduceJsonObject
     */
    public function testPrependCanProduceJsonObject($first, $second): void
    {
        $this->group->prepend($first);
        $this->group->prepend($second);
        $jsonFromGroup = $this->group->json();
        $this->assertJson($jsonFromGroup, json_encode([$first, $second]));
    }

    /**
     * @param $first
     * @param $second
     * @param $third
     * @throws RosaException
     * @dataProvider scalarProvider
     */
    public function testCanProduceObjectScalarNoProps($first, $second, $third): void
    {
        $this->group->append($first);
        $this->group->append($second);
        $this->group->append($third);
        // since there are no keys, this should return nothing
        $objectFromGroup = $this->group->toGenericObject();
        try {
            $ref = new ReflectionClass($objectFromGroup);
            $this->assertCount(0, $ref->getProperties());
        } catch (ReflectionException $reflectionException) {
            $this->fail($reflectionException->getMessage());
        }
        // and if we try with keys, we should get some props
    }

    /**
     * @param $first
     * @param $second
     * @param $third
     * @throws RosaException
     * @dataProvider scalarProvider
     * @depends testCanProduceObjectNoProps
     */
    public function testPrependCanProduceObjectScalarNoProps($first, $second, $third): void
    {
        $this->group->prepend($first);
        $this->group->prepend($second);
        $this->group->prepend($third);
        // since there are no keys, this should return nothing
        $objectFromGroup = $this->group->toGenericObject();
        try {
            $ref = new ReflectionClass($objectFromGroup);
            $this->assertCount(0, $ref->getProperties());
        } catch (ReflectionException $reflectionException) {
            $this->fail($reflectionException->getMessage());
        }
        // and if we try with keys, we should get some props
    }

    /**
     * @param $scalar
     * @param $key
     * @throws RosaException
     * @dataProvider scalarPropsProvider
     * @depends testCanProduceObjectScalarNoProps
     */
    public function testCanProduceObjectScalarProps($scalar, $key): void
    {
        $this->group->append($scalar, $key);
        $objectFromGroup = $this->group->toGenericObject();
        $this->assertEquals($scalar, $objectFromGroup->{$key});
    }

    /**
     * @param $scalar
     * @param $key
     * @throws RosaException
     * @dataProvider scalarPropsProvider
     * @depends testCanProduceObjectScalarNoProps
     */
    public function testPrependCanProduceObjectScalarProps($scalar, $key): void
    {
        $this->group->prepend($scalar, $key);
        $objectFromGroup = $this->group->toGenericObject();
        $this->assertEquals($scalar, $objectFromGroup->{$key});
    }

    /**
     * @param $first
     * @param $second
     * @dataProvider objectProvider
     */
    public function testCanProduceObjectNoProps($first, $second): void
    {
        try {
            $this->group->append($first);
            $this->group->append($second);
            $objectFromGroup = $this->group->toGenericObject();
            $this->assertIsObject($objectFromGroup);
            foreach ($objectFromGroup as $index => $singleObject) {
                $arrayFormat = json_decode(json_encode($singleObject), true);
                $keys = array_keys($arrayFormat);
                foreach ($keys as $key) {
                    $this->assertEquals($singleObject->{$key}, $arrayFormat[$key]);
                }
            }
        } catch (RosaException $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @param $first
     * @param $second
     * @dataProvider objectProvider
     */
    public function testPrependCanProduceObjectNoProps($first, $second): void
    {
        try {
            $this->group->prepend($first);
            $this->group->prepend($second);
            $objectFromGroup = $this->group->toGenericObject();
            $this->assertIsObject($objectFromGroup);
            foreach ($objectFromGroup as $index => $singleObject) {
                $arrayFormat = json_decode(json_encode($singleObject), true);
                $keys = array_keys($arrayFormat);
                foreach ($keys as $key) {
                    $this->assertEquals($singleObject->{$key}, $arrayFormat[$key]);
                }
            }
        } catch (RosaException $exception) {
            $this->fail($exception->getMessage());
        }
    }


    /**
     * @param $object
     * @param $key
     * @depends testCanProduceObjectNoProps
     * @dataProvider objectPropsProvider
     */
    public function testCanProduceObjectProps($object, $key): void
    {
        try {
            $this->group->append($object, $key);
            $objectFromGroup = $this->group->toGenericObject();
            $this->canProduceObjectPropsAssertions($objectFromGroup, $object);
        } catch (RosaException $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @param $object
     * @param $key
     * @depends testCanProduceObjectProps
     * @dataProvider objectPropsProvider
     */
    public function testPrependCanProduceObjectProps($object, $key): void
    {

        try {
            $this->group->prepend($object, $key);
            $objectFromGroup = $this->group->toGenericObject();
            $this->canProduceObjectPropsAssertions($objectFromGroup, $object);
        } catch (RosaException $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * takes care of a code duplication problem
     * @param $objectFromGroup
     * @param $object
     */
    public function canProduceObjectPropsAssertions($objectFromGroup, $object): void
    {

        $this->assertIsObject($objectFromGroup);

        $arrayFormat = json_decode(json_encode($objectFromGroup), true);
        $keys = array_keys($arrayFormat);
        foreach ($keys as $k) {
            $this->assertIsObject($objectFromGroup->{$k});
            $this->assertEquals($object, $objectFromGroup->{$k}); // the keyed object
        }
    }

    public function testCanDestroy(): void
    {
        // in the case of the base group, the group itself is just an array
        try {
            $this->group->append(true);
        } catch (RosaException $exception) {
            $this->fail($exception->getMessage());
        }
        $this->assertEquals(1, $this->group->count());
        $this->group->destroy();
        $this->assertEquals(0, $this->group->count());
    }


    /**
     * @throws RosaException
     */
    public function testKeyExceptionNoDefaultHandler(): void
    {
        $this->expectException(Error::class);
        $this->group->append(null, false);
        $this->group->append(null, true);
        $this->group->append(null, []);
        $this->group->append(null, (new stdClass()));
    }

    /**
     * @return array
     */
    public function scalarProvider(): array
    {
        return [
            [1, true, 'three'],
            [1.0, -1, null]
        ];
    }

    /**
     * @return array
     */
    public function objectProvider(): array
    {
        $objectOne = new stdClass();
        $objectOne->foo = 'bar';
        $objectTwo = new stdClass();
        $objectTwo->bar = 'foo';
        return [
            [$objectOne, $objectTwo]
        ];
    }

    /**
     * @return array
     */
    public function scalarPropsProvider(): array
    {
        return [
            [1, 'foo'],
            [true, 'bar'],
            ['str', 'baz'],
            [1.0, 'one'],
            [-1, 'two'],
            [null, 'three']
        ];
    }

    /**
     * @return array
     */
    public function objectPropsProvider(): array
    {
        $objOne = new stdClass();
        $objOne->foo = 'bar';
        $objTwo = new stdClass();
        $objTwo->bar = 'foo';
        return [
            [$objOne, 'object_1'],
            [$objTwo, 'object_2']
        ];
    }
}
