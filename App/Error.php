<?php

namespace AD\App;

class Error
{
    public static function get(string $errorCode, string $errorText)
    {
        return new \WP_Error($errorCode, __($errorText, 'ad-starter'));
    }
}
