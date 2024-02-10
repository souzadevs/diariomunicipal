<?php

namespace App\Helpers;

class ServiceHelper
{
    public static function hasEmptyParam(...$args)
    {
        foreach($args as $arg) {
            if (empty($arg)) {
                return true;
            }
        }

        return false;
    }
    
}