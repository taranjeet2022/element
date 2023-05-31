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

Since this class is derived from the WordPress Plugin API so are the license and they are GPL http://www.gnu.org/licenses/gpl.html

  [1]: https://github.com/bainternet/PHP-Hooks/zipball/master
  [2]: https://github.com/bainternet/PHP-Hooks/tarball/master
  [3]: http://bainternet.github.com/PHP-Hooks/
