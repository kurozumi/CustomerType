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

namespace Plugin\CustomerType\Repository;


use Eccube\Repository\AbstractRepository;
use Plugin\CustomerType\Entity\CustomerType;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Class CustomerTypeRepository
 * @package Plugin\CustomerType\Repository
 */
class CustomerTypeRepository extends AbstractRepository
{
    /**
     * CustomerTypeRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CustomerType::class);
    }
}
