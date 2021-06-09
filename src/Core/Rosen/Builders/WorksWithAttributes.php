<?php

declare(strict_types=1);

namespace Rosa\Core\Rosen\Builders;

use ReflectionMethod;
use ReflectionClass;
use ReflectionProperty;
use ReflectionAttribute;

trait WorksWithAttributes
{

    /**
     * @param  string  $attributeClassName
     * @param  ReflectionClass|ReflectionMethod|ReflectionProperty  $reflectedObject
     * @return array|ReflectionAttribute|null
     */
    public function getAttributeByName(
        string $attributeClassName,
        ReflectionClass | ReflectionMethod | ReflectionProperty $reflectedObject
    ): array | ReflectionAttribute | null {
        $attributesArr = $reflectedObject->getAttributes($attributeClassName);
        if (count($attributesArr) === 0) {
            return null;
        }
        foreach ($attributesArr as $attr) {
            if (!$attr->isRepeated()) {
                return $attr;
            }
        }
        return $attributesArr;
    }
}
