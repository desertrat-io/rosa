<?php


namespace Rosa\Subsystem\Data\Bus;

/**
 * Allows for virtual keying whereby two objects can have the same virtual key but different physical keys when
 * and underlying comparison is done
 * Class DataSymbol
 * @package Rosa\Subsystem\Data\Bus
 */
class DataSymbol
{

    /**
     * @var string
     */
    private $originalKey;

    /**
     * @var string
     */
    private $suffixSeparator;

    /**
     * @var string|null
     */
    private $currentSymbol = null;

    /**
     * DataSymbol constructor.
     * @param  string  $key
     * @param  string  $suffixSeparator
     */
    public function __construct(string $key, $suffixSeparator = '_')
    {
        $this->setKeyBase($key);
        $this->setKeySuffix($suffixSeparator);
        $this->regenerateSymbol();
    }

    /**
     * @param  string  $key
     */
    public function setKeyBase(string $key): void
    {
        $this->originalKey = $key;
    }
    
    /**
     * @param  string  $suffixSeparator
     */
    public function setKeySuffix(string $suffixSeparator): void
    {
        $this->suffixSeparator = $suffixSeparator;
    }

    /**
     * @return string
     */
    public function symbol(): string
    {
        return $this->currentSymbol;
    }

    /**
     * This can be called to change the symbol for any given key in a collection of symbols if need be
     */
    public function regenerateSymbol(): void
    {
        $this->currentSymbol = $this->originalKey . $this->suffixSeparator . uniqid(md5(time()), true);
    }
}
