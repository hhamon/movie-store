<?php

class myUser extends sfGuardSecurityUser
{
    public function getCart()
    {
        if (!$cart = $this->getAttribute('cart')) {
            return false;
        }

        return array_count_values($cart);
    }

    public function getOrder()
    {
        return $this->getAttribute('order_ref');
    }

    public function removeOrder()
    {
        $this->attributeHolder->remove('order_ref');
    }

    public function setOrder($reference)
    {
        $this->attributeHolder->remove('cart');
        $this->setAttribute('order_ref', $reference);
    }

    public function addMovie($id)
    {
        $cart = $this->getAttribute('cart', array());

        $cart[] = $id;

        $this->setAttribute('cart', $cart);
    }
}
