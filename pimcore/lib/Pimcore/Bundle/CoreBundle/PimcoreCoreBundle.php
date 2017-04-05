<?php
/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Bundle\CoreBundle;

use Pimcore\Bundle\CoreBundle\DependencyInjection\Compiler\AreabrickPass;
use Pimcore\Bundle\CoreBundle\DependencyInjection\Compiler\PimcoreContextResolverAwarePass;
use Pimcore\Bundle\CoreBundle\DependencyInjection\Compiler\PimcoreGlobalTemplatingVariablesPass;
use Pimcore\Bundle\CoreBundle\DependencyInjection\Compiler\PhpTemplatingPass;
use Pimcore\Bundle\CoreBundle\DependencyInjection\Compiler\SessionConfiguratorPass;
use Pimcore\Bundle\CoreBundle\DependencyInjection\Compiler\WebDebugToolbarListenerPass;
use Pimcore\Cache;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class PimcoreCoreBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new PimcoreContextResolverAwarePass());
        $container->addCompilerPass(new PhpTemplatingPass());
        $container->addCompilerPass(new AreabrickPass());
        $container->addCompilerPass(new PimcoreGlobalTemplatingVariablesPass());
        $container->addCompilerPass(new SessionConfiguratorPass());
        $container->addCompilerPass(new WebDebugToolbarListenerPass());
    }
}