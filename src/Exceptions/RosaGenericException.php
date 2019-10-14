<?php


namespace Rosa\Exceptions;

use Rosa\Interfaces\Constant\Http;
use Rosa\Interfaces\Exception\ExceptionActions;
use Rosa\Interfaces\Exception\ExceptionTypes;
use Rosa\Interfaces\Exception\RosaException;

/**
 * Class RosaGenericException
 * @package Rosa\Exceptions
 */
class RosaGenericException extends RosaException
{

    public function getErrorCode(): int
    {
        return ExceptionTypes::ROSA_GENERIC_EXCEPTION
            & ExceptionActions::ROSA_GENERIC_ACT;
    }

    public function getHttpCode(): int
    {
        return Http::SERVER_ERROR;
    }

}
