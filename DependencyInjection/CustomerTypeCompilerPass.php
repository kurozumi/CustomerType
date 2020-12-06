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

namespace Plugin\CustomerType\DependencyInjection;


use Plugin\CustomerType\Service\Customer\CustomerContext;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class CustomerTypeCompilerPass implements CompilerPassInterface
{
    const CUSTOMR_TYPE_TAG = 'eccube.customer.type';

    public function process(ContainerBuilder $container)
    {
        $context = $container->findDefinition(CustomerContext::class);

        foreach($container->findTaggedServiceIds(self::CUSTOMR_TYPE_TAG) as $id => $tags) {
            $context->addMethodCall('addType', [new Reference($id)]);
        }
    }
}
