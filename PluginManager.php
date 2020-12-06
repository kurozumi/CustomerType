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

namespace Plugin\CustomerType;


use Doctrine\ORM\EntityManagerInterface;
use Eccube\Plugin\AbstractPluginManager;
use Plugin\CustomerType\Entity\CustomerType;
use Plugin\CustomerType\Service\Customer\Type\Gold;
use Plugin\CustomerType\Service\Customer\Type\Regular;
use Plugin\CustomerType\Service\Customer\Type\Silver;
use Symfony\Component\DependencyInjection\ContainerInterface;

class PluginManager extends AbstractPluginManager
{
    public function enable(array $meta, ContainerInterface $container)
    {
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $container->get('doctrine.orm.entity_manager');

        $customerTypeRepository = $entityManager->getRepository(CustomerType::class);
        foreach($this->initialData() as $data)  {
            $customerType = $customerTypeRepository->findOneBy([
                "name" => $data["name"],
                "type_class" => $data["type_class"]
            ]);
            if(null === $customerType) {
                $customerType = new CustomerType();
                $customerType
                    ->setName($data["name"])
                    ->setTypeClass($data["type_class"]);
                $entityManager->persist($customerType);
            }
        }
        $entityManager->flush();

    }

    private function initialData()
    {
        return [
            ["name" => "レギュラー会員" , "type_class" => Regular::class],
            ["name" => "シルバー会員", "type_class" => Silver::class],
            ["name" => "ゴールド会員", "type_class" => Gold::class]
        ];
    }
}
