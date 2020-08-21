<?php

namespace TickTackk\ImageAttachmentCacheControl\Option;

use XF\Entity\Option as OptionEntity;
use XF\Option\AbstractOption;

class ImageAttachmentCacheControlConfig extends AbstractOption
{
    public static function verifyOption(array &$value, OptionEntity $option) : bool
    {
        $value = \array_merge([
            'enabled' => false,
            'config' => [
                'cacheability' => 'private',
                'max_age' => 0
            ]
        ], $value);
        $value['config']['max_age'] = \max(1, (int) $value['config']['max_age']);

        if (!\in_array($value['config']['cacheability'], ['private', 'public'], true))
        {
            // intentionally not explicit
            $option->error(\XF::phrase('please_enter_valid_value'));
            return false;
        }

        return true;
    }
}