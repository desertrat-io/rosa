<?php


namespace Rosa\Collections\Data\TypedGroups;

use Rosa\Collections\Data\TypedGroup;
use Rosa\Exceptions\Core\RosaInvalidTypeException;

/**
 * Class StringGroup
 * @package Rosa\Collections\Data
 * @codeCoverageIgnore
 */
class StringGroup extends TypedGroup
{

    protected static string $typeName = 'string';

    protected function getParameterizedType()
    {
    }

    protected function checkType($valueToCheck)
    {
        if (!is_string($valueToCheck)) {
            throw new RosaInvalidTypeException($this->getTypeErrorMsg(gettype($valueToCheck)));
        }
    }
}
