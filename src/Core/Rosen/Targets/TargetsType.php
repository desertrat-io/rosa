<?php

declare(strict_types=1);

namespace Rosa\Core\Rosen\Targets;

use ReflectionClass;

/**
 * Class TargetsType
 *
 * @package Rosa\Core\Rosen\Targets
 * @author  Mike Lawson <mike@desertrat.io>
 * @license MIT https://opensource.org/licenses/MIT
 */
interface TargetsType
{

    public function setType(ReflectionClass $class): void;
}
