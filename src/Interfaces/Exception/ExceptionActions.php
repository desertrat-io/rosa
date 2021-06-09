<?php


namespace Rosa\Interfaces\Exception;

/**
 * Class ExceptionActions
 * @package Rosa\Interfaces\Exception
 */
interface ExceptionActions
{

    /*
     * Action taken
     * What action must have been happening when the exception was thrown
     */

    public const ROSA_GENERIC_ACT = 0x000001; //generic and/or unknown

    public const ROSA_COLLECTION_ACT = 0x000002; // the exception occurred during an operation on a collection
}
