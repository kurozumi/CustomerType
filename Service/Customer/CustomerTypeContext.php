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

namespace Plugin\CustomerType\Service\Customer;


use Eccube\Entity\Customer;
use Plugin\CustomerType\Entity\CustomerType;

class CustomerTypeContext
{
    /** @var CustomerTypeInterface[] */
    private $types = [];

    public function addType(CustomerTypeInterface $type)
    {
        $this->types[] = $type;
    }

    /**
     * 条件にマッチした会員タイプを取得
     *
     * @param Customer $customer
     * @return CustomerType
     */
    public function getCustomerType(Customer $customer): CustomerType
    {
        foreach ($this->types as $type) {
            if ($type->verify($customer)) {
                return $type->getCustomerType();
            }
        }

        throw new \InvalidArgumentException(trans("会員タイプが取得できませんでした。"));
    }
}
