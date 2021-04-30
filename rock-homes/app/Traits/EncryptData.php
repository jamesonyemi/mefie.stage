<?php

namespace App\Traits;

trait EncryptData
{
    public static function hashData($args): String
    {
        # code...
       return password_hash($args, PASSWORD_ARGON2I );
    }

    public static function generateCustomerToken($customer_token): String
    {
        /**
         * generate a new if doesn't exist...
         * @param mixed $customer_token
         * @return string
         * @throws conditon
         **/
        
        return empty($customer_token) ? sha1(time()).(Crypt::encrypt(sha1(time().random_int(1111, 9999)))) : $customer_token;
        
    }
}