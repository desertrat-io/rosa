<?php


namespace Rosa\Interfaces\Exception;

use Exception;


/**
 * Class RosaException
 * @package Rosa\Interfaces\Exception
 */
abstract class RosaException extends Exception
{

    /**
     * A helpful error code useful for internal debugging
     * @return int
     */
    abstract public function getErrorCode(): int;

    /**
     * Helps with any return responses to a client
     * @return int
     */
    abstract public function getHttpCode(): int;
}
