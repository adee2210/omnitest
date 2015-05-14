<?php

namespace Omnipay\Omnitest\Message;

/**
 * Omnitest Post Request
 */
class PostRequest extends AbstractRequest
{
    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        $data = $this->getBaseData();
        $data['txnRequest'] = $this->getXmlString();

        return $data;
    }

    /**
     * Get XML string
     *
     * @return string
     */
    protected function getXmlString()
    {
        $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
                <PostRequest
                    xmlns=\"http://www.optimalpayments.com/creditcard/xmlschema/v1\"
                    xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"
                    xsi:schemaLocation=\"http://www.optimalpayments.com/creditcard/xmlschema/v1\" />";

        $sxml = new \SimpleXMLElement($xml);

        $sxml->addChild('sid', $this->getSid());
        $sxml->addChild('rcode', $this->getRcode());
        $sxml->addChild('country', $this->getCountry());
        $sxml->addChild('addfee', $this->getAddfee());
        $sxml->addChild('cart', $this->getCart());
        $sxml->addChild('summary', $this->getSummary());
        $sxml->addChild('currency_code', $this->getCurrencyCode());
        $sxml->addChild('items', $this->getItems());
        $sxml->addChild('name', $this->getName());
        $sxml->addChild('quantity', $this->getQuantity());
        $sxml->addChild('amount_unit', $this->getAmountUnit());
        $sxml->addChild('item_no', $this->getItemNo());
        $sxml->addChild('item_desc', $this->getItemDesc());

        return $sxml->asXML();
    }
}
