<?php

/**
 * Class Inject
 *
 * @package Rosa\Core\Attributes
 * @author  Mike Lawson <mike@desertrat.io>
 * @license MIT https://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace Rosa\Core\Rosen\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_PROPERTY)]
final class Inject
{
    public ?string $inline;

    public function __construct(?string $inline = null)
    {
        $this->inline = $inline;
    }
}
