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
 * Class Regular
 * @package Plugin\CustomerType\Service\Customer\Type
 *
 * トータルの購入金額が1000円未満の場合はレギュラー会員
 */
class Regular extends AbstractType
{
    /**
     * @param Customer $customer
     * @return bool
     */
    public function verify(Customer $customer): bool
    {
        return $customer->getBuyTotal() < 1000;
    }
}
