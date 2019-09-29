<?php


namespace RosaTest\Unit\Subsystem\Data\Adapters\Controllers;

use Rosa\Subsystem\Data\Adapters\Controllers\CloudController;
use Rosa\Subsystem\Data\Adapters\Controllers\StorageController;
use RosaTest\Unit\RosaTestCase;
use ReflectionClass;

/**
 * Class CloudControllerTest
 * @package RosaTest\Unit\Subsystem\Data\Adapters\Controllers
 * @covers \Rosa\Subsystem\Data\Adapters\Controllers\CloudController
 */
class CloudControllerTest extends RosaTestCase
{

    /**
     * @var ReflectionClass
     */
    private $reflector;

    public function setUp(): void
    {
        parent::setUp();
        $this->reflector = new ReflectionClass(CloudController::class);
    }

    public function testIsDataController(): void
    {
        $this->assertTrue($this->reflector->isAbstract());
        $this->assertTrue($this->reflector->implementsInterface(StorageController::class));
    }
}
