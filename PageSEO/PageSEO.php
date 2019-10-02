<?php

namespace PageSEO;

use ChrisKonnertz\OpenGraph\OpenGraph;

class PageSEO
{
    public function title($type, array $attr, $locale='en')
    {
        $name = $attr['name'];
        $brand = isset($attr['brand']) ? $attr['brand'] : null;
        $site = isset($attr['site']) ? $attr['site'] : null;

        $return = $name;

        switch ($locale) {
        case 'en':
        case 'english':
            switch ($type) {
            case 'article':
                $return = sprintf('%s | %s', $name, $site);
                break;

            case 'brand':
                $return = sprintf('1000s of DISCOUNTS on %s', $name);
                break;

            case 'product':
                if ($brand) {
                    $return = sprintf('NEW, %s by %s', $name, $brand);
                } else {
                    $return = sprintf('NEW, %s by %s', $name, $brand);
                }

                break;
            }

            break;

        case 'da':
        case 'danish':
            switch ($type) {
            case 'article':
                $return = sprintf('%s | %s', $name, $site);
                break;

            case 'brand':
                $return = sprintf('1000vis af RABATTER på %s', $name);
                break;

            case 'product':
                if ($brand) {
                    $return = sprintf('NYT, %s fra %s', $name, $brand);
                } else {
                    $return = sprintf('NYT, %s', $name);
                }

                break;
            }

            break;
        }

        return $return;
    }

    public function description($type, array $attr, $locale='en')
    {
        $name = $attr['name'];
        $brand = isset($attr['brand']) ? $attr['brand'] : null;

        $return = $name;

        switch ($locale) {
        case 'en':
        case 'english':
            switch ($type) {
            case 'brand':
                $return = sprintf('1000s of DISCOUNTS on %s', $name);
                break;

            case 'product':
                if ($brand) {
                    $return = sprintf('Current DISCOUNTS on %s / %s', $name, $brand);
                } else {
                    $return = sprintf('Current DISCOUNTS on %s', $name);
                }

                break;
            }

            break;

        case 'da':
        case 'danish':
            switch ($type) {
            case 'brand':
                $return = sprintf('1000vis af RABATTER på %s', $name);
                break;

            case 'product':
                if ($brand) {
                    $return = sprintf('Aktuelt TILBUD på %s / %s', $name, $brand);
                } else {
                    $return = sprintf('Aktuelt TILBUD på %s', $name);
                }

                break;
            }

            break;
        }

        return $return;
    }

    public function all($type, array $attr, $locale='en')
    {
        $res = new \StdClass();

        $res->title = $this->title(
            'product',
            [
                'name' => $attr['name'],
                'brand' => $attr['brand'],
            ],
            $locale
        );

        $res->description = $this->description(
            'product',
            [
                'name' => $attr['name'],
                'brand' => $attr['brand'],
            ],
            $locale
        );

        switch ($type) {
        case 'product':
            $res->json = \JsonLd\Context::create('product', [
                'name' => $attr['name'],
                'description' => $attr['description'],
                'brand' => $attr['brand'],
                'sku' => $attr['sku'],
                'url' => $attr['url'],
                'offers' => [
                    'price' => $attr['price'],
                    'priceCurrency' => $attr['currency'],
                ],
                'category' => $attr['category'],
            ]);

            $res->og = new OpenGraph();
            $res->og->type('product')
                ->title($res->title)
                ->image($attr['image_url'])
                ->description($res->description)
                ->url($url)
                ;

            break;
        }

        return $res;
    }
}
