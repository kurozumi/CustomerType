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

interface CustomerTypeInterface
{
    /**
     * @return bool
     *
     * 会員タイプを決定する条件を実装
     */
    public function verify(Customer $customer): bool;

    /**
     * @return CustomerType
     *
     * 会員タイプのオブジェクトを返す
     */
    public function getCustomerType(): CustomerType;
}
