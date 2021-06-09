<?php

declare(strict_types=1);

namespace Rosa\Core\Rosen\Targets;

use ReflectionProperty;

/**
 * Class TargetsProperty
 *
 * @package Rosa\Core\Rosen\Targets
 * @author  Mike Lawson <mike@desertrat.io>
 * @license MIT https://opensource.org/licenses/MIT
 */
interface TargetsProperty
{

    public function setProperty(ReflectionProperty $property): void;
}
