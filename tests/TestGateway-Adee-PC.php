<?php
namespace Adee2210\Omnitest\TestGateway;

use Adee2210\Omnitest\Gateway;

class TestGateway extends PHPUnit_Framework_TestCase
{
    public function TestccPurchaseSuccess()
    {
        $expect = '[{"mxsid":10146,"payby":"bpay","title":"BPay","display_title":null,"description":null,"transfertime":null,"transferlimit":null,"currency_code":"AUD","currency_symbol":"$","image":"--Logo URL--","fee":{"srccode":"AUD","destcode":"USD","rate":0.96801106010318,"effectivedate":"2011-04-04","flatfee":3,"mdr":1},"fields":{"card_no":{"description":"","type":"hidden","value":"70720297711","title":""},"description":{"description":"","type":"span","value":"--HTML String--"}}}]';

        $gateway = $this->getMockBuilder('Adee2210\Omnitest\Gateway')->getMock();
        //$gateway = new Adee2210\Omnitest;
        $args = array(
            'sid' => 'ST001',
            'rcode' => 'SR10X125B',
            'country' => 'AUS',
            'addfee' => true,
            'cart' => array(1=>2,2=>1), //Product ID => Quantity
            'summary' => array('amount'=>'200.00','quantity'=>'3'),
            'currency_code' => 'AUD',
            'items' => array(
                1 => array(
                    'name' => 'Mouse Logitech M510',
                    'quantity' => 2,
                    'amount_unit' => '50.00',
                    'item_no' => 'ML159',
                    'item_desc' => 'Wireless Mouse, 3-year limited hardware warranty'
                ),
                2 => array(
                    'name' => 'Keyboard Azio PRISM',
                    'quantity' => 1,
                    'amount_unit' => '100.00',
                    'item_no' => 'MA101',
                    'item_desc' => 'USB Keyboard, 3-year limited hardware warranty'
                ),
            ),
        );

        $response = $gateway->postForm('ccPurchase',$args);

        $this->assertEquals($response,$expect);
    }

    public function TestccPurchaseFailSummary()
    {
        $expect = '{"status":"EXC","msg":"Amount and Quantity didn\'t match!"}';

        $gateway = $this->getMockBuilder('Adee2210\Omnitest\Gateway')->getMock();
        //$gateway = new Adee2210\Omnitest;
        $args = array(
            'sid' => 'ST001',
            'rcode' => 'SR10X125B',
            'country' => 'AUS',
            'addfee' => true,
            'cart' => array(1=>2,2=>1), //Product ID => Quantity
            'summary' => array('amount'=>'100.00','quantity'=>'3'),
            'currency_code' => 'AUD',
            'items' => array(
                1 => array(
                    'name' => 'Mouse Logitech M510',
                    'quantity' => 2,
                    'amount_unit' => '50.00',
                    'item_no' => 'ML159',
                    'item_desc' => 'Wireless Mouse, 3-year limited hardware warranty'
                ),
                2 => array(
                    'name' => 'Keyboard Azio PRISM',
                    'quantity' => 1,
                    'amount_unit' => '100.00',
                    'item_no' => 'MA101',
                    'item_desc' => 'USB Keyboard, 3-year limited hardware warranty'
                ),
            ),
        );

        $response = $gateway->postForm('ccPurchase',$args);

        $this->assertEquals($response,$expect);
    }
}
?>