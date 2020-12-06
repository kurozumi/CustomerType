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

namespace Plugin\CustomerType\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Class CustomerType
 * @package Plugin\CustomerType\Entity
 *
 * @ORM\Table(name="plg_customer_type")
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Entity(repositoryClass="Plugin\CustomerType\Repository\CustomerTypeRepository")
 */
class CustomerType
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer", options={"unsigned":true})
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $type_class;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getTypeClass(): string
    {
        return $this->type_class;
    }

    /**
     * @param string $type_class
     * @return $this
     */
    public function setTypeClass(string $type_class): self
    {
        $this->type_class = $type_class;

        return $this;
    }
}
