# omnitest

**Installation
```
composer require adee2210/omnitest:dev-master
```

**How to use

Step 1 : Initialize
```php
$gateway = new Adee2210\Omnitest\Gateway;
```
Step 2 : Call Gateway function (ie. ccPurchase)
```php
$args = $gateway->getConfig(array('run' => 'ccPurchase'));
```
Step 3 : Get all Gateway fields
```php
$Fields = $args['args'];
$OptionalField = $args['optional'];
```
Step 4 : Post variable or Get Gateway result
```php
$response = $gateway->postForm('ccPurchase', $app['request']->request->all());
```