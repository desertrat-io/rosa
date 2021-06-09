<?php
/**
 * Class RoseAttributeImplementation
 *
 * @package Rosa\Core\Rosen
 * @author  Mike Lawson <mike@desertrat.io>
 * @license MIT https://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace Rosa\Core\Rosen;

use ReflectionClass;
use ReflectionException;
use Rosa\Core\Rosen\Exceptions\InvalidRosenClassException;

class RoseAttributeImplementation
{
    public function __construct(private string $implementingClass, private array $classConstructorArguments)
    {
    }

    public function resolveImplementation()
    {

    }

    /**
     * @return object
     * @throws InvalidRosenClassException
     */
 /*   public function resolveImplementation(): object
    {
        try {
            $classReflector = new ReflectionClass($this->implementingClass);
            $classConstructor = $classReflector->getConstructor();
            if ($classConstructor === null) {
                throw new InvalidRosenClassException('Invalid constructor for class ' . $this->implementingClass);
            }
            $params = $classConstructor->getParameters();
            $numRequired = 0;
            foreach ($params as $param) {
                if (!$param->isOptional()) {
                    $numRequired++;
                } else {
                    // don't keep looping if we hit an optional argument, kind of pointless
                    break;
                }
            }
            // we only really care about required. if there are too many overall then we don't really care
            if ($numRequired > count($this->classConstructorArguments)) {
                throw new InvalidRosenClassException('Argument mismatch, not all required arguments present');
            }
            return $classReflector->newInstanceArgs($this->classConstructorArguments);
        } catch (ReflectionException $e) {
            throw new InvalidRosenClassException(
                'Could not create class ' .
                $this->implementingClass . ' because of ' . $e->getMessage()
            );
        }
    }*/
}
