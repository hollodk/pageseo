<?php

use PageSEO\PageSEO;

require_once(__DIR__.'/vendor/autoload.php');

$seo = new PageSEO;

$attr = [
    'name' => 'Canon Z1000',
    'brand' => 'Canon',
    'description' => 'That is seriously a nice camera, go grap it!',
    'sku' => 'xs-123',
    'url' => 'https://www.canon.com/canon-z1000',
    'price' => 100,
    'currency' => 'EUR',
    'category' => 'tech',
];

$all = $seo->all(
    'product',
    $attr,
    'en'
);

var_dump($all);

$title = $seo->title(
    'product',
    $attr,
    'en'
);

$description = $seo->description(
    'product',
    $attr,
    'en'
);

var_dump($description);
