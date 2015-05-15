<?php

namespace Adee2210\Omnitest;

use Omnipay\Common\AbstractGateway;

/**
 * Omnitest Class
 */
class Gateway extends AbstractGateway
{

    /**
     * Get name of the gateway
     *
     * @return string
     */
    public function getName()
    {
        return 'Omni Test';
    }

    /**
     * Get default parameters
     *
     * @return array
     */
    public function getDefaultParameters()
    {
        return array(
            'sid' => '',
            'rcode' => '',
            'country' => '',
            'cart' => array(),
            'summary' => array(),
            'currency_code' => '',
            'items' => array(),
            'name' => '',
            'quantity' => 0,
            'amount_unit' => '',
            'item_no' => '',
            'item_desc' => '',
        );
    }

    /**
     * Create a new post.
     *
     * @param array An array of options
     * @return \Omnipay\ResponseInterface
     */
    public function post(array $parameters = array())
    {
        return $this->createRequest('\Adee2210\Omnitest\Message\PostRequest', $parameters);
    }

    /**
     * Setter for Site id
     *
     * @param string $value
     * @return $this
     */
    public function setSid($value)
    {
        return $this->setParameter('sid', $value);
    }

    /**
     * Getter for Site id
     *
     * @return string
     */
    public function getSid()
    {
        return $this->getParameter('sid');
    }

    /**
     * Setter for Site RCODE
     *
     * @param string $value
     * @return $this
     */
    public function setRcode($value)
    {
        return $this->setParameter('rcode', $value);
    }

    /**
     * Getter for RCODE
     *
     * @return string
     */
    public function getRcode()
    {
        return $this->getParameter('rcode');
    }

    /**
     * Setter for Country of the user
     *
     * @param string $value
     * @return $this
     */
    public function setCountry($value)
    {
        return $this->setParameter('country', $value);
    }

    /**
     * Getter for Country of the user
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->getParameter('country');
    }

    /**
     * Setter for Add FEE condition
     *
     * @param string $value
     * @return $this
     */
    public function setAddfee($value)
    {
        return $this->setParameter('addfee', $value);
    }

    /**
     * Getter for Add FEE condition
     *
     * @return string
     */
    public function getAddfee()
    {
        return $this->getParameter('addfee');
    }

    /**
     * Setter for Cart
     *
     * @param string $value
     * @return $this
     */
    public function setCart($value)
    {
        return $this->setParameter('cart', $value);
    }

    /**
     * Getter for Cart
     *
     * @return string
     */
    public function getCart()
    {
        return $this->getParameter('cart');
    }

    /**
     * Setter for Summary
     *
     * @param string $value
     * @return $this
     */
    public function setSummary($value)
    {
        return $this->setParameter('summary', $value);
    }

    /**
     * Getter for Summary
     *
     * @return string
     */
    public function getSummary()
    {
        return $this->getParameter('summary');
    }

    /**
     * Setter for Currency Code
     *
     * @param string $value
     * @return $this
     */
    public function setCurrencyCode($value)
    {
        return $this->setParameter('currency_code', $value);
    }

    /**
     * Getter for Currency Code
     *
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->getParameter('currency_code');
    }

    /**
     * Setter for Items
     *
     * @param string $value
     * @return $this
     */
    public function setItems($value)
    {
        return $this->setParameter('items', $value);
    }

    /**
     * Getter for Items
     *
     * @return string
     */
    public function getItems()
    {
        return $this->getParameter('items');
    }

    /**
     * Setter for Name
     *
     * @param string $value
     * @return $this
     */
    public function setName($value)
    {
        return $this->setParameter('name', $value);
    }

    /**
     * Getter for Name
     *
     * @return string
     */
    public function getName()
    {
        return $this->getParameter('name');
    }

    /**
     * Setter for Quantity
     *
     * @param string $value
     * @return $this
     */
    public function setQuantity($value)
    {
        return $this->setParameter('quantity', $value);
    }

    /**
     * Getter for Quantity
     *
     * @return string
     */
    public function getQuantity()
    {
        return $this->getParameter('quantity');
    }

    /**
     * Setter for Amount Unit
     *
     * @param string $value
     * @return $this
     */
    public function setAmountUnit($value)
    {
        return $this->setParameter('amount_unit', $value);
    }

    /**
     * Getter for Amount Unit
     *
     * @return string
     */
    public function getAmountUnit()
    {
        return $this->getParameter('amount_unit');
    }

    /**
     * Setter for Item No
     *
     * @param string $value
     * @return $this
     */
    public function setItemNo($value)
    {
        return $this->setParameter('item_no', $value);
    }

    /**
     * Getter for Item No
     *
     * @return string
     */
    public function getItemNo()
    {
        return $this->getParameter('item_no');
    }

    /**
     * Setter for Item Description
     *
     * @param string $value
     * @return $this
     */
    public function setItemDesc($value)
    {
        return $this->setParameter('item_desc', $value);
    }

    /**
     * Getter for Item Description
     *
     * @return string
     */
    public function getItemDesc()
    {
        return $this->getParameter('item_desc');
    }
}
