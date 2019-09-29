<?php


namespace RosaTest\Unit\Subsystem\Data\Bus;

use Rosa\Subsystem\Data\Bus\DataSymbol;
use RosaTest\Unit\RosaTestCase;
use ReflectionClass;
use ReflectionException;
use ReflectionProperty;

/**
 * Class DataSymbolTest
 * @package RosaTest\Unit\Subsystem\Data\Bus
 */
class DataSymbolTest extends RosaTestCase
{

    /**
     * @var string
     */
    private $symbolKey = 'testkey';

    /**
     * @var string
     */
    private $symbolKeySuffix = '|';

    /**
     * @var DataSymbol
     */
    private $symbolCurrentSymbol;

    /**
     * @var DataSymbol
     */
    private $symbolCurrentSymbolAll;

    /**
     * @var ReflectionClass
     */
    private $dataSymbolReflection;

    /**
     * @var ReflectionProperty
     */
    private $keyProp;

    /**
     * @var ReflectionProperty
     */
    private $keySuffixProp;

    /**
     * @var ReflectionProperty
     */
    private $currentSymbolProp;

    /**
     * @var string
     */
    private $defaultSymbolKeySuffix = '_';

    /**
     * @var ReflectionClass
     */
    private $currentSymbolRef;

    /**
     * @var ReflectionClass
     */
    private $currentSymbolAllRef;

    /**
     * @var ReflectionProperty
     */
    private $constructorKeyValue;

    /**
     * @var ReflectionProperty
     */
    private $defaultSeparatorValue;

    /**
     * @var ReflectionProperty
     */
    private $defaultSymbolValue;

    public function setUp(): void
    {
        parent::setUp();
        try {
            $this->symbolCurrentSymbol = new DataSymbol($this->symbolKey);
            $this->symbolCurrentSymbolAll = new DataSymbol($this->symbolKey, $this->symbolKeySuffix);

            $this->currentSymbolRef = new ReflectionClass($this->symbolCurrentSymbol);
            $this->currentSymbolAllRef = new ReflectionClass($this->symbolCurrentSymbolAll);

            $this->constructorKeyValue = $this->currentSymbolRef->getProperty('originalKey');
            $this->defaultSeparatorValue = $this->currentSymbolRef->getProperty('suffixSeparator');
            $this->defaultSymbolValue = $this->currentSymbolRef->getProperty('currentSymbol');

            $this->constructorKeyValue->setAccessible(true);
            $this->defaultSeparatorValue->setAccessible(true);
            $this->defaultSymbolValue->setAccessible(true);
        } catch (ReflectionException $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @param  DataSymbol  $testSymbol
     * @dataProvider symbolTestProvider
     */
    public function testDataSymbolConstructorDefault(DataSymbol $testSymbol): void
    {
        $this->assertEquals($this->symbolKey, $this->constructorKeyValue->getValue($testSymbol));
        $this->assertEquals($this->defaultSymbolKeySuffix, $this->defaultSeparatorValue->getValue($testSymbol));
        $this->assertNotNull($this->defaultSymbolValue->getValue($testSymbol));
    }

    /**
     * @param  DataSymbol  $testSymbol
     * @param  DataSymbol  $testSymbolAll
     * @dataProvider symbolTestProvider
     */
    public function testDataSymbolConstructorAll(DataSymbol $testSymbol, DataSymbol $testSymbolAll): void
    {
        $this->assertEquals($this->symbolKey, $this->constructorKeyValue->getValue($testSymbolAll));
        $this->assertEquals($this->symbolKeySuffix, $this->defaultSeparatorValue->getValue($testSymbolAll));
        $this->assertNotNull($this->defaultSymbolValue->getValue($testSymbolAll));
    }

    /**
     * @param  DataSymbol  $testSymbol
     * @dataProvider symbolTestProvider
     */
    public function testDataSymbolKeyBase(DataSymbol $testSymbol): void
    {
        $this->symbolCurrentSymbol->setKeyBase('new');
        $this->assertNotEquals('new', $this->constructorKeyValue->getValue($testSymbol));
        $testSymbol->setKeyBase('new');
        $this->assertEquals('new', $this->constructorKeyValue->getValue($testSymbol));
    }

    /**
     * @param  DataSymbol  $testSymbol
     * @param  DataSymbol  $testSymbolCustomSuffix
     * @dataProvider symbolTestProvider
     */
    public function testDataSymbolSeparator(DataSymbol $testSymbol, DataSymbol $testSymbolCustomSuffix): void
    {
        $this->symbolCurrentSymbol->setKeySuffix($this->symbolKeySuffix);
        $this->assertNotEquals('..', $this->defaultSeparatorValue->getValue($testSymbolCustomSuffix));
        $testSymbol->setKeySuffix($this->symbolKeySuffix);
        $this->assertEquals($this->symbolKeySuffix, $this->defaultSeparatorValue->getValue($testSymbolCustomSuffix));
    }

    /**
     * @param $testSymbol
     * @dataProvider symbolTestProvider
     */
    public function testSymbolInitial(DataSymbol $testSymbol): void
    {
        $this->assertEquals($testSymbol->symbol(), $this->defaultSymbolValue->getValue($testSymbol));
    }

    /**
     * @param  DataSymbol  $testSymbol
     * @dataProvider symbolTestProvider
     * @depends testSymbolInitial
     */
    public function testSymbolRegen(DataSymbol $testSymbol): void
    {
        $currentTestSymbol = $testSymbol->symbol();
        $testSymbol->regenerateSymbol();
        $newTestSymbol = $testSymbol->symbol();
        $this->assertNotEquals($currentTestSymbol, $newTestSymbol);
    }

    /**
     * @param  DataSymbol  $testSymbol
     * @param  DataSymbol  $testSymbolAll
     * @dataProvider symbolTestProvider
     * @depends testSymbolRegen
     */
    public function testSymbolGenAltSuffix(DataSymbol $testSymbol, DataSymbol $testSymbolAll): void
    {
        $currentTestSymbol = $testSymbolAll->symbol();
        $testSymbolAll->regenerateSymbol();
        $newTestSymbol = $testSymbolAll->symbol();
        $this->assertNotEquals($currentTestSymbol, $newTestSymbol);

        $currentDefaultSymbol = $testSymbol->symbol();
        $testSymbol->regenerateSymbol();
        $currentTestSymbolAll = $testSymbolAll->symbol();
        $this->assertNotEquals($currentDefaultSymbol, $currentTestSymbolAll);
    }

    /**
     * @return array
     */
    public function symbolTestProvider(): array
    {
        $testSymbol = new DataSymbol($this->symbolKey);
        $testSymbolCustomSuffix = new DataSymbol($this->symbolKey, $this->symbolKeySuffix);
        return [
            [$testSymbol, $testSymbolCustomSuffix]
        ];
    }
}
