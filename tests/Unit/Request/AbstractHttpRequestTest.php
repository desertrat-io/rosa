<?php


namespace RosaTest\Unit\Request;

use Rosa\Interfaces\Request\Request;
use Rosa\Interfaces\Request\AbstractHttpRequest;

use ReflectionClass;
use RosaTest\Unit\RosaTestCase;

/**
 * Class AbstractHttpRequestTest
 * @package RosaTest\Unit\Request
 * @covers \Rosa\Interfaces\Request\AbstractCloudRequest
 */
class AbstractHttpRequestTest extends RosaTestCase
{

    protected ReflectionClass $httpRequestRef;

    public function setUp(): void
    {
        parent::setUp();
        $this->httpRequestRef = new ReflectionClass(AbstractHttpRequest::class);
    }

    public function testIsARequest(): void
    {
        $this->assertTrue($this->httpRequestRef->implementsInterface(Request::class));
    }
}
