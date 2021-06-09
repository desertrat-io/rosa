<?php
/**
 * Class InvalidRosenClassException
 *
 * @package Rosa\Core\Rosen\Exceptions
 * @author  Mike Lawson <mike@desertrat.io>
 * @license MIT https://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace Rosa\Core\Rosen\Exceptions;

use Rosa\Interfaces\Constant\Http;
use Rosa\Interfaces\Exception\RosaException;
use Throwable;

class InvalidRosenClassException extends RosaException
{
    public function getErrorCode(): int
    {
        return RosenExceptionConstants::INVALID_CLASS_EXCEPTION;
    }

    public function getHttpCode(): int
    {
        return Http::SERVER_ERROR;
    }

}
