<?php
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
     * One Cart has One Customer.
     * @ORM\OneToOne(targetEntity="Customer", inversedBy="cart")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     */
    private $customer;

    /**
     * One cart has many cart_items
     * @ORM\OneToMany(targetEntity="CartItem", mappedBy="Cart", cascade={"persist", "remove"})
     */
    private $cart_items;

    public function __construct()
    {
        $this->cart_items = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getCartItems(){
        return $this->cart_items->toArray();
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

    public function getMyCartItems()
    {
        return array_map(
            function ($cartItem) {
                return $cartItem->getProduct();
            },
            $this->cart_items->toArray()
        );
    }

    public function getCustomer(Customer $customer) {
        return $this->$customer;
    }

    public function setCustomer($customer){
        $this->customer = $customer;
        return $this;
    }


}