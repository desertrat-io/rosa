<?php

declare(strict_types=1);

namespace Rosa\Core\Rosen;

/**
 * Class AbstractModule
 *
 * @package Rosa\Core\Rosen
 * @author  Mike Lawson <mike@desertrat.io>
 * @license MIT https://opensource.org/licenses/MIT
 */
abstract class AbstractModule
{
    abstract public function configure(): void;
}
