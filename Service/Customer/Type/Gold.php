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

/**
 * Class Gold
 * @package Plugin\CustomerType\Service\Customer\Type
 *
 * トータルの購入金額が5000円以上の場合はゴールド会員
 */
class Gold extends AbstractType
{
    public function verify(Customer $customer): bool
    {
        return $customer->getBuyTotal() >= 5000;
    }
}
