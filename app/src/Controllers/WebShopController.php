<?php
use doctrine\orm\EntityManager;
/**
 * Created by PhpStorm.
 * User: ruiter
 * Date: 27-2-2018
 * Time: 16:18
 */

// https://future500.nl/articles/2013/09/doctrine-2-how-to-handle-join-tables-with-extra-columns/
E
$customer = $entityManager ->find('Customer', 1);
$cart = $customer->getCart();  // get the (only) cart this person has
echo $cart-getMyCartItems();