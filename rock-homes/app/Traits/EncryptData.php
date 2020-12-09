<?php

namespace App\Traits;

trait EncryptData
{
    public static function hashData($args):String
    {
        # code...
       return password_hash($args, PASSWORD_ARGON2I );
    }
}