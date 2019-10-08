<?php

use PageSEO\PageSEO;

require_once(__DIR__.'/vendor/autoload.php');

$text = <<<EOF
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu blandit odio. Vivamus vitae bibendum lorem, non maximus ante. Quisque sit amet ante purus. Donec nec egestas magna. Fusce quis efficitur quam. Mauris sit amet volutpat leo. Maecenas ipsum ante, interdum in maximus vitae, porttitor at ipsum. In vel leo et elit rhoncus fermentum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean tempor mauris nec justo efficitur accumsan.

Maecenas fermentum augue eu tortor elementum, vitae iaculis sapien eleifend. Sed at libero id urna malesuada imperdiet quis id nisi. Suspendisse dapibus metus sit amet sem porttitor, vel pellentesque nibh suscipit. Aenean vel tellus arcu. Vivamus turpis lectus, malesuada sed auctor nec, dignissim a est. Etiam vitae nulla mollis, finibus quam sed, aliquam massa. Praesent finibus mattis dui vel lobortis. Ut ac quam et justo iaculis fermentum et vel elit. Pellentesque et dui ultricies, laoreet neque at, luctus nisl. Mauris mollis nec diam in mollis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus et nulla et ligula venenatis consequat vel quis arcu. Donec aliquam ullamcorper mi at molestie. Aliquam finibus orci lacus, non sodales orci iaculis sed.
EOF;

$seo = new PageSEO;

// Product

$attr = [
    'site_name' => 'Couponia.dk',
    'name' => 'Canon Z1000',
    'brand' => 'Canon',
    'description' => $text,
    'sku' => 'xs-123',
    'url' => 'https://www.canon.com/canon-z1000',
    'image_url' => 'https://www.google.com/image.jpg',
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

// Article

$attr = [
    'site_name' => 'Couponia.dk',
    'name' => 'Top 10 reasons to travel to Europe',
    'body' => $text,
    'url' => 'https://www.myblog.com/top-10-reasons-to-travel-to-europe',
    'image_url' => 'https://www.google.com/image.jpg',
    'author' => 'Peter Larsen',
    'publisher' => 'Peter Larsen AG',
    'published_at' => date('Y-m-d'),
    'created_at' => date('Y-m-d'),
    'modified_at' => date('Y-m-d'),
];

$all = $seo->all(
    'article',
    $attr,
    'en'
);

var_dump($all);

// Competition

$attr = [
    'site_name' => 'Couponia.dk',
    'name' => 'Konkurrence siden',
    'description' => $text,
    'url' => 'https://www.canon.com/canon-z1000',
    'image_url' => 'https://www.google.com/image.jpg',
    'breadcrumb' => [
        [
            'url' => '/',
            'name' => 'Homepage',
        ],
        [
            'url' => '/shop',
            'name' => 'Shop',
        ],
        [
            'url' => '/shop/nailpolish-1ml',
            'name' => 'Nailpolish 1ml',
        ],
    ],
];

$all = $seo->all(
    'competition',
    $attr,
    'en'
);

var_dump($all);
