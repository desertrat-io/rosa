<?php

declare(strict_types=1);

namespace Rosa\Core\Rosen;

use ReflectionMethod;
use Rosa\Core\Rosen\Targets\TargetsMethod;

/**
 * Class TestAttributeImpl
 *
 * @package Rosa\Core\Rosen
 * @author  Mike Lawson <mike@desertrat.io>
 * @license MIT https://opensource.org/licenses/MIT
 */

// rosen attribute should itself be an attribute
// maybe when we want to implement an attribute, in the attr def like
// #Rosen() where #Rosen is target class attr that takes
// a single parameter, that being the name of the class that implements it
// when the Rosen is registered (figure me out)...
//
class TestAttributeImpl extends RosenAttribute implements TargetsMethod
{

    public function __construct(TestAttribute $testAttribute)
    {
        // TODO
    }

    public function hasArgument(): bool
    {
        return true;
    }

    public function numArguments(): int
    {
        return 1;
    }

    public function setMethod(ReflectionMethod $method): void
    {
        // TODO: Implement setMethod() method.
    }

}
