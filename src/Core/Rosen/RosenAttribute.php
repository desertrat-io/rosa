<?php
/**
 * Class RosenAttribute
 *
 * @package Rosa\Core\Rosen
 * @author  Mike Lawson <mike@desertrat.io>
 * @license MIT https://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace Rosa\Core\Rosen;

/**
 * Class RosenAttribute
 *
 * @package Rosa\Core\Rosen
 * @author  Mike Lawson <mike@desertrat.io>
 * @license MIT https://opensource.org/licenses/MIT
 */
abstract class RosenAttribute
{

    /**
     * @return bool
     */
    public function hasArguments(): bool
    {
        return $this->numArguments() > 0;
    }

    /**
     * @return int
     */
    public function numArguments(): int
    {
        return 0;
    }


}
