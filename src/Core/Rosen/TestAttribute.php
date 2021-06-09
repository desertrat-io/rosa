<?php
/**
 * Class TestAttribute
 *
 * @package Rosa\Core\Rosen
 * @author  Mike Lawson <mike@desertrat.io>
 * @license MIT https://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace Rosa\Core\Rosen;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
#[Rosen(TestAttributeImpl::class)]
class TestAttribute
{

    public function __construct(public string $someValue)
    {
    }
}
