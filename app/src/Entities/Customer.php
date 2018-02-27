<?php
use Doctrine\ORM\Mapping as ORM;

/**
 * Example
 *
 * @ORM\Entity
 * @ORM\Table(name="Customer")
 *
 */
class Customer
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var integer
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $name;

    /**
     * One Customer has One Cart.
     * @ORM\OneToOne(targetEntity="Cart", mappedBy="customer")
     */
    private $cart;

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function getCart() {
        return $this->cart;
    }

    public function setCart(Cart $cart) {
        $this->cart = $cart;
        return $this;
    }
}