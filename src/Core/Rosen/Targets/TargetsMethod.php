<?php

declare(strict_types=1);

namespace Rosa\Core\Rosen\Targets;

use ReflectionMethod;

/**
 * Class TargetsMethod
 *
 * @package Rosa\Core\Rosen\Targets
 * @author  Mike Lawson <mike@desertrat.io>
 * @license MIT https://opensource.org/licenses/MIT
 */
interface TargetsMethod
{

    public function setMethod(ReflectionMethod $method): void;
}
