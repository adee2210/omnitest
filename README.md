# omnitest

**Gateway Operations**

Operation | Decription
--- | ---
ccPurchase | Allow you to test Payment Gateway without transfer money.

**ccPurchase elements**

Element | Child Element | Required | Type | Description
--- | --- | --- | --- | ---
sid | --- | Yes | String | Site id (unique identifier for the web site)
rcode | --- | Yes | String | Site RCODE
country | --- | Yes | String | Country of the user - will provide the list of payments available for that country
addfee | --- | No | Boolean | This will add the processing fees on top of the amount.
cart | --- | Yes | Array | Information about the purchase items. This is only compulsory for feeapi, do not sent the cart to rawfeeapi.
summary | amount | Yes | Float | Contains a summary of amount contents
summary | quantity | Yes | Integer | Contains a summary of cart contents
currency_code | --- | Yes | String | 3 digit currency code
items | --- | Yes | Array | Contains the cart items
--- | (numerical index) | Yes | Array | Contains information about one item in the cart (Repeat until all cart items are listed)
--- | name | Yes | String | Category, can be used freely
--- | quantity | Yes | Integer | Quantity of the item
--- | amount_unit | Yes | String | Unit price amount (without commas and only 2 decimals places)
--- | item_no | Yes | String | Article number
--- | item_desc | Yes | String | Item description

**Installation**
```
composer require adee2210/omnitest:dev-master
```

**How to use**

*Step 1* : Initialize
```php
$gateway = new Adee2210\Omnitest\Gateway;
```
*Step 2* : Call Gateway Operation (ie. ccPurchase)
```php
$args = $gateway->getConfig(array('run' => 'ccPurchase'));
```
*Step 3* : Get all Operation fields
```php
$Fields = $args['args'];
$OptionalField = $args['optional'];
```
*Step 4* : Post variable or Get Gateway result
```php
$response = $gateway->postForm('ccPurchase', $app['request']->request->all());
```

**Response**

*Success*
```json
[ { "mxsid": "10146", "payby": "bpay", "title": "BPay", "display_title": null, "description": null, "transfertime": null, "transferlimit": null, "currency_code": "AUD", "currency_symbol": "$", "image": "--Logo URL--", "fee": { "srccode": "AUD", "destcode": "USD", "rate": 0.96801106010318, "effectivedate": "2011-04-04",  "flatfee": 3, "mdr": 1 }, "fields": { "card_no": { "description": "", "type": "hidden", "value": "70720297711", "title": "" }, "description": { "description": "", "type": "span", "value": "--HTML String--" }, } }]
```
*Fail*
```json
{"status":"EXC","msg":"Some error message here"}
```
