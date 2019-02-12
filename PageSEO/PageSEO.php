<?php

namespace PageSEO;

class PageSEO
{
    public function title($type, array $attr, $locale='en')
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
        $description = isset($attr['description']) ? $attr['description'] : null;

        $return = $name;

        switch ($locale) {
        case 'en':
        case 'english':
            switch ($type) {
            case 'brand':
                $return = sprintf('1000s of DISCOUNTS on %s', $name);
                break;

            case 'product':
                if ($description) {
                    $return = sprintf('Current DISCOUNTS on %s', $name, $description);
                } else {
                    $return = sprintf('Current DISCOUNTS on %s / %s', $name);
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
                if ($description) {
                    $return = sprintf('Aktuelt TILBUD på %s / %s', $name, $description);
                } else {
                    $return = sprintf('Aktuelt TILBUD på %s', $name);
                }

                break;
            }

            break;
        }

        return $return;
    }
}
