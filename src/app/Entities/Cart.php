<?php
namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Example
 *
 * @ORM\Entity
 * @ORM\Table(name="Cart")
 *
 */
class Cart
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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * One Cart has One Customer.
     * @ORM\OneToOne(targetEntity="Customer", inversedBy="cart")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     */
    protected $customer;

    /**
     * One cart has many cart_items
     * @ORM\OneToMany(targetEntity="CartItem", mappedBy="cart", cascade={"persist", "remove"})
     */
    private $cart_items;

    public function __construct()
    {
        $this->cart_items = new ArrayCollection();
    }

    public function getCartItems(){
        return $this->cart_items;
    }

    public function addCartItem(CartItem $cartItem) {
        if (!$this->cart_items->contains($cartItem)) {
            $this->cart_items->add($cartItem);
            $cartItem->setProduct($this);
        }
    }

    public function removeCartItem(CartItem $cartItem) {
        if ($this->cart_items->contains($cartItem)) {
            $this->cart_items->removeElement($cartItem);
            $cartItem->setPerson(null);
        }
    }

    /**
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    public function setCustomer(Customer $customer){
        $this->customer = $customer;
        return $this;
    }


}