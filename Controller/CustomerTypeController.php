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

namespace Plugin\CustomerType\Controller;


use Eccube\Controller\AbstractController;
use Eccube\Entity\Customer;
use Plugin\CustomerType\Service\Customer\CustomerContext;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Routing\Annotation\Route;

class CustomerTypeController extends AbstractController
{
    /**
     * @var CustomerContext
     */
    private $customerContext;

    public function __construct(CustomerContext $customerContext)
    {
        $this->customerContext = $customerContext;
    }

    /**
     * @return Response
     *
     * @Route("/customer/type", name="customer_type")
     */
    public function index()
    {
        if (!$this->getUser() instanceof Customer) {
            throw new AccessDeniedHttpException();
        }

        $customerType = $this->customerContext->handle($this->getUser());
        $message = sprintf("あなたは%sです。", $customerType->getName());

        return new Response($message);
    }
}
