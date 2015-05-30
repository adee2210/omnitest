<?php
namespace Adee2210\Omnitest;

use Adee2210\Common\GatewayCore;
use Adee2210\Common\GatewayTemplate;

class Gateway extends GatewayCore implements GatewayTemplate
{

    public function __construct()
    {
        return $this->setConfig() && $this->setVars() && $this->setName();
    }

    private function setName(){
        return $this->name = 'Omnitest Gateway';
    }

    private function setConfig($args = array())
    {
        return $this->configs = array(
            'ccPurchase' => array(
                'args' => array(
                    'sid',
                    'rcode',
                    'country',
                    'addfee',
                    'cart',
                    'summary.amount',
                    'summary.quantity',
                    'currency_code',
                    'items' => array(
                        'name',
                        'quantity',
                        'amount_unit',
                        'item_no',
                        'item_desc',
                    )
                ),
                'description' => 'Allows you to test Payment gateway.',
                'url' => 'http://www.adeeisme.com/omnitest/api/',
                'txnMode' => 'ccPurchase',
                'optional' => array(
                    'addfee',
                ),
                'format' => array(
                    'send' =>     'json',
                    'receive' => 'json',
                ),
                'response' => 'ccTxnResponseV1'
            )
        );
    }

    private function setVars($args = array())
    {
        return $this->vars = array(
            'form'=>array(
                'sid' => array(
                    'type' => 'text',
                    'description' => 'Site id (unique identifier for the web site)',
                ),
                'rcode' => array(
                    'type' => 'text',
                    'description' => 'Site RCODE',
                ),
                'country' => array(
                    'type' => 'text',
                    'description' => 'Country of the user - will provide the list of payments
    available for that country',
                ),
                'addfee' => array(
                    'type' => 'select',
                    'default' => array( true => 'True', false => 'False'),
                    'description' => 'This will add the processing fees on top of the amount.',
                ),
                'cart' => array(
                    'type' => 'text',
                    'description' => 'Information about the purchase items. This is only
    compulsory for feeapi, do not sent the cart to rawfeeapi.',
                ),
                'summary' => array(
                    'type' => 'text',
                    'description' => 'Contains a summary of cart contents',
                ),
                'currency_code' => array(
                    'type' => 'text',
                    'description' => '3 digit currency code',
                ),
                'items' => array(
                    'type' => 'array',
                    'description' => 'Contains the cart items',
                ),
                'name' => array(
                    'type' => 'text',
                    'description' => 'Category, can be used freely',
                ),
                'quantity' => array(
                    'type' => 'text',
                    'description' => 'Quantity of the item',
                ),
                'amount_unit' => array(
                    'type' => 'text',
                    'description' => 'Unit price amount (without commas and only 2 decimals
    places)',
                ),
                'item_no' => array(
                    'type' => 'text',
                    'description' => 'Article number',
                ),
                'item_desc' => array(
                    'type' => 'text',
                    'description' => 'Item description',
                ),
            )
        );
    }
}
?>
