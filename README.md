pageseo
=======

> This is a nifty toolkit to keep your SEO tags clean.

[![Build Status](https://img.shields.io/travis/hollodk/pageseo.svg?style=flat)](https://travis-ci.org/hollodk/pageseo)
[![Scrutinizer Quality Score](https://img.shields.io/scrutinizer/g/hollodk/pageseo.svg?style=flat)](https://scrutinizer-ci.com/g/hollodk/pageseo/)
[![Scrutinizer Code Intelligence](https://scrutinizer-ci.com/g/hollodk/pageseo/badges/code-intelligence.svg)](https://scrutinizer-ci.com/g/hollodk/pageseo/)

[![Latest Release](https://img.shields.io/packagist/v/mh/pageseo.svg)](https://packagist.org/packages/mh/pageseo)
[![MIT License](https://img.shields.io/packagist/l/mh/pageseo.svg)](http://opensource.org/licenses/MIT)
[![Total Downloads](https://img.shields.io/packagist/dt/mh/pageseo.svg)](https://packagist.org/packages/mh/pageseo)

Developed by [Michael Holm](http://hollo.dk)

```
<?php

use PageSEO\PageSEO;

require_once(__DIR__.'/vendor/autoload.php');

$seo = new PageSEO;

$title = $seo->title(
    'product',
    [
        'name' => 'Canon Z1000',
        'brand' => 'Canon',
    ],
    'en'
);

var_dump($title);
```
