<?php


namespace RosaTest\Unit\Subsystem\Data\Adapters\Controllers;

use Rosa\Subsystem\Data\Adapters\Controllers\LocalController;
use Rosa\Subsystem\Data\Adapters\Controllers\StorageController;
use RosaTest\Unit\RosaTestCase;
use ReflectionClass;

/**
 * Class LocalControllerTest
 * @package RosaTest\Unit\Subsystem\Data\Adapters\Controllers
 * @covers \Rosa\Subsystem\Data\Adapters\Controllers\LocalController
 */
class LocalControllerTest extends RosaTestCase
{

    /**
     * @var ReflectionClass
     */
    private $reflector;

    public function setUp(): void
    {
        parent::setUp();
        $this->reflector = new ReflectionClass(LocalController::class);
    }

    public function testIsDataController(): void
    {
        $this->assertTrue($this->reflector->isAbstract());
        $this->assertTrue($this->reflector->implementsInterface(StorageController::class));
    }
}
