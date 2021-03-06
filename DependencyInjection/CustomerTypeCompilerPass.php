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


use Plugin\CustomerType\Service\Customer\CustomerTypeContext;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class CustomerTypeCompilerPass implements CompilerPassInterface
{
    const CUSTOMR_TYPE_TAG = 'eccube.customer.type';

    /**
     * eccube.customer.typeがタグ付けされた会員タイプクラスをCustomerTypeContextに追加する
     *
     * @param ContainerBuilder $container
     * @throws \Symfony\Component\DependencyInjection\Exception\InvalidArgumentException
     * @throws \Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException
     */
    public function process(ContainerBuilder $container)
    {
        $context = $container->findDefinition(CustomerTypeContext::class);

        foreach($container->findTaggedServiceIds(self::CUSTOMR_TYPE_TAG) as $id => $tags) {
            $context->addMethodCall('addType', [new Reference($id)]);
        }
    }
}
