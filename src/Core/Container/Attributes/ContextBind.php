<?php
/**
 * Class ContextBind
 *
 * This attribute allows for injection bindings to be made on the fly.
 * An exception is thrown is some kind of conflict occurs if a binding is
 * ambiguous
 *
 * @package Rosa\Core\Attributes
 * @author  Mike Lawson <mike@desertrat.io>
 * @license MIT https://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace Rosa\Core\Container\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
final class ContextBind
{
    public function __construct(public string $interface, public string $concrete, public string $contextClass)
    {
    }
}
