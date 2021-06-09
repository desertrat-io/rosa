<?php

/**
 * Class Rosen
 *
 * This attribute is basically just the master attribute that Rosen uses to identify
 * implementations of a specific attribute
 *
 * @package Rosa\Core\Rosen
 * @author  Mike Lawson <mike@desertrat.io>
 * @license MIT https://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace Rosa\Core\Rosen;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
class Rosen
{
    public function __construct(public string $implementedBy)
    {
    }
}
