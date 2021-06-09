<?php

declare(strict_types=1);

namespace Rosa\Core\Rosen\Builders;

/**
 * Class Builder
 *
 * @package Rosa\Core\Rosen\Builders
 * @author  Mike Lawson <mike@desertrat.io>
 * @license MIT https://opensource.org/licenses/MIT
 */
interface Builder
{

    public function build(string $interfaceName, string $concreteName);

}
