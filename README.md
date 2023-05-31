PHP-Element-Class
=================

The PHP Element Class allows you to print html element.

How to install?
=====

```shell
composer require krypton/element
```

How to use?
=====

A simple example ...

```php
<?php

use Krypton\Element\Element;

$alert = [
  'name' => 'div',
  'attrs' => [
      'class' => 'alert alert-info',
      'role' => 'alert'
   ],
  'elements' => [
      [
         'name' => 'string',
         'content' => 'A simple info alert—check it out!'
      ]
   ]
];

$element = new Element($alert['name'], $alert['attrs'], $alert['elements']);
$element->render();
```    

License
=======

This class is provided as per the GPL license http://www.gnu.org/licenses/gpl.html
