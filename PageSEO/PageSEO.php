<?php

namespace PageSEO;

use ChrisKonnertz\OpenGraph\OpenGraph;

class PageSEO
{
    public function title($type, array $attr, $locale='en')
    {
        $name = $attr['name'];
        $site = $attr['site_name'];
        $brand = isset($attr['brand']) ? $attr['brand'] : null;

        switch ($locale) {
        case 'da':
        case 'dk':
        case 'danish':
        case 'dansk':
            switch ($type) {
            case 'brand':
                $return = sprintf('1000vis af RABATTER på %s @ %s', $name, $site);
                break;

            case 'product':
                if ($brand) {
                    $return = sprintf('NYT, %s fra %s @ %s', $name, $brand, $site);
                } else {
                    $return = sprintf('NYT, %s @ %s', $name, $site);
                }

                break;

            default:
                $return = sprintf('%s @ %s', $name, $site);
                break;
            }

            break;

        default:
            switch ($type) {
            case 'brand':
                $return = sprintf('1000s of DISCOUNTS on %s @ %s', $name, $site);
                break;

            case 'product':
                if ($brand) {
                    $return = sprintf('NEW, %s by %s @ %s', $name, $brand, $site);
                } else {
                    $return = sprintf('NEW, %s @ %s', $name, $site);
                }

                break;

            default:
                $return = sprintf('%s @ %s', $name, $site);
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

        switch ($locale) {
        case 'da':
        case 'dk':
        case 'danish':
        case 'dansk':
            switch ($type) {
            case 'article':
                $return = substr($attr['body'], 0, 155);
                break;

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

            default:
                $return = substr($attr['description'], 0, 155);
            }

            break;

        default:
            switch ($type) {
            case 'article':
                $return = substr($attr['body'], 0, 155);
                break;

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

            default:
                $return = substr($attr['description'], 0, 155);

                break;
            }

            break;
        }

        return $return;
    }

    public function breadcrumb($routes)
    {
        $params = [];
        foreach ($routes as $route) {
            $params[] = [
                'url' => $route['url'],
                'name' => $route['name'],
            ];
        }

        $breadcrumbs = \JsonLd\Context::create('breadcrumb_list', [
            'itemListElement' => $params,
        ]);

        return $breadcrumbs;
    }

    public function all($type, array $attr, $locale='en')
    {
        $res = new \StdClass();

        $brand = isset($attr['brand']) ? $attr['brand'] : null;

        $res->title = $this->title(
            $type,
            $attr,
            $locale
        );

        $res->description = $this->description(
            $type,
            $attr,
            $locale
        );

        $res->breadcrumb = null;
        if (isset($attr['breadcrumb'])) {
            $res->breadcrumb = $this->breadcrumb($attr['breadcrumb']);
        }

        switch ($type) {
        case 'product':
            $res->json = \JsonLd\Context::create('product', [
                'name' => $attr['name'],
                'description' => $attr['description'],
                'brand' => $brand,
                'sku' => $attr['sku'],
                'url' => $attr['url'],
                'offers' => [
                    'price' => $attr['price'],
                    'priceCurrency' => $attr['currency'],
                ],
                'category' => $attr['category'],
            ]);

            $res->og = new OpenGraph();
            $res->og
                ->type('product')
                ->title($res->title)
                ->image($attr['image_url'])
                ->siteName($attr['site_name'])
                ->description($res->description)
                ->url($attr['url'])
                ;

            break;

        case 'article':
            $res->json = \JsonLd\Context::create('article', [
                'headline' => $attr['name'],
                'image' => $attr['image_url'],
                'author' => [
                    'name' => $attr['author'],
                ],
                'publisher' => [
                    'name' => $attr['publisher'],
                ],
                'mainEntityOfPage' => $attr['url'],
                'datePublished' => $attr['published_at'],
                'dateCreated' => $attr['created_at'],
                'dateModified' => $attr['modified_at'],
                'description' => $res->description,
            ]);

            $res->og = new OpenGraph();
            $res->og
                ->type('article')
                ->title($res->title)
                ->image($attr['image_url'])
                ->siteName($attr['site_name'])
                ->description($res->description)
                ->url($attr['url'])
                ;

            break;
        }

        return $res;
    }
}
