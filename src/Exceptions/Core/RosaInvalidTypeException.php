<?php

declare(strict_types=1);

namespace Rosa\Exceptions\Core;

use Rosa\Exceptions\RosaGenericException;
use Rosa\Interfaces\Constant\Http;
use Rosa\Interfaces\Exception\ExceptionActions;
use Rosa\Interfaces\Exception\ExceptionTypes;

/**
 * Class RosaInvalidTypeException
 *
 * @package Rosa\Exceptions\Core
 * @author  Mike Lawson <mike@desertrat.io>
 * @license MIT https://opensource.org/licenses/MIT
 */
class RosaInvalidTypeException extends RosaGenericException
{

    public function getErrorCode(): int
    {
        return ExceptionTypes::ROSA_PARAM_EXCEPTION
            & ExceptionTypes::ROSA_TYPE_EXCEPTION
            & ExceptionActions::ROSA_COLLECTION_ACT;
    }

    public function getHttpCode(): int
    {
        return Http::SERVER_ERROR;
    }
}
