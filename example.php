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
