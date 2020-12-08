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


use Plugin\CustomerType\Service\Customer\CustomerTypeInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

class CustomerTypeExtension extends Extension
{
    /**
     * 会員タイプのStrategyインターフェースが実装されたクラスにeccube.customer.typeをタグ付け
     *
     * @param array $configs
     * @param ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $container->registerForAutoconfiguration(CustomerTypeInterface::class)
            ->addTag(CustomerTypeCompilerPass::CUSTOMR_TYPE_TAG);
    }
}
