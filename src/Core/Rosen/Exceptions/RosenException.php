<?php

declare(strict_types=1);

namespace Rosa\Core\Rosen\Exceptions;

use Rosa\Interfaces\Constant\Http;
use Rosa\Interfaces\Exception\RosaException;

/**
 * Class RosenException
 *
 * @package Rosa\Core\Rosen\Exceptions
 * @author  Mike Lawson <mike@desertrat.io>
 * @license MIT https://opensource.org/licenses/MIT
 */
class RosenException extends RosaException
{

    /**
     * @inheritDoc
     */
    public function getErrorCode(): int
    {
        return RosenExceptionConstants::GENERIC_ROSEN_EXCEPTION;
    }

    /**
     * @inheritDoc
     */
    public function getHttpCode(): int
    {
        return Http::SERVER_ERROR;
    }
}
