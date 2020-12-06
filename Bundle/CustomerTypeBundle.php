<?php
/**
 * This file is part of CustomerType
 *
 * Copyright(c) Akira Kurozumi <info@a-zumi.net>
 *
 *  https://a-zumi.net
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\CustomerType\Bundle;


use Plugin\CustomerType\DependencyInjection\CustomerTypeCompilerPass;
use Plugin\CustomerType\DependencyInjection\CustomerTypeExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class CustomerTypeBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new CustomerTypeCompilerPass());
    }

    public function getContainerExtension()
    {
        return new CustomerTypeExtension();
    }
}
