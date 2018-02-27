<?php
use Doctrine\ORM\Mapping as ORM;

/**
 * Example
 *
 * @ORM\Entity
 * @ORM\Table(name="cart_items")
 *
 */
class CartItem
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
     * @ORM\Column(type="integer")
     */
    protected $amount;

    /**
     * @ORM\ManyToOne(targetEntity="Cart", inversedBy="cart_items")
     * @ORM\JoinColumn(name="cart_id", referencedColumnName="id", nullable=FALSE)
     */
    protected $cart;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="cart_items")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id", nullable=FALSE)
     */
    protected $product;

    public function getId() {
        return $this->id;
    }

    public function getCart() {
        return $this->cart;
    }

    public function setCart(Cart $cart = null) {
        $this->cart = $cart;
        return $this;
    }

    public function getProduct() {
        return $this->product;
    }

    public function setProduct(Product $product = null) {
        $this->product = $product;
        return $this;
    }
}