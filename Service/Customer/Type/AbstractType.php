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

namespace Plugin\CustomerType\Service\Customer\Type;


use Eccube\Entity\Customer;
use Plugin\CustomerType\Entity\CustomerType;
use Plugin\CustomerType\Repository\CustomerTypeRepository;
use Plugin\CustomerType\Service\Customer\CustomerTypeInterface;

abstract class AbstractType implements CustomerTypeInterface
{
    /**
     * @var CustomerTypeRepository
     */
    private $customerTypeRepository;

    /**
     * AbstractType constructor.
     * @param CustomerTypeRepository $customerTypeRepository
     */
    public function __construct(CustomerTypeRepository $customerTypeRepository)
    {
        $this->customerTypeRepository = $customerTypeRepository;
    }

    /**
     * @param Customer $customer
     * @return bool
     */
    abstract public function verify(Customer $customer): bool;

    /**
     * クラス名から会員タイプを取得
     *
     * @return CustomerType
     */
    public function getCustomerType(): CustomerType
    {
        $customerType = $this->customerTypeRepository->findOneBy([
            'type_class' => get_class($this)
        ]);

        return $customerType;
    }
}
