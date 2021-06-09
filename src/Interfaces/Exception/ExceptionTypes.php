<?php

namespace Rosa\Interfaces\Exception;

/**
 * Class ExceptionTypes
 * @package Rosa\Interfaces\Exception
 */
interface ExceptionTypes
{
    /*
     * Base exception types. Can be used to categorize the highest
     * level of an exception
     */
    public const ROSA_GENERIC_EXCEPTION = 0x000001; //generic and/or unknown

    public const ROSA_PARAM_EXCEPTION = 0x000002; // the exception was caused by a parameter

    public const ROSA_TYPE_EXCEPTION = 0x000003; // the exception was caused by a type of some sort

}
