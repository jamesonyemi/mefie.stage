<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PhoneNumberValidation extends Controller
{

    public static function processPhoneNumberValidation()
    {
        # code...
        static::extendPhoneNumberValidation();
        static::phoneNumberValidationMessage();
    }

    public static function extendPhoneNumberValidation()
    {
        # code...
        Validator::extend('phone', function($attribute, $value, $parameters, $validator) {
            return preg_match('%^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$%i', $value) && strlen($value) >= 10;
        });
    }

    public static function phoneNumberValidationMessage()
    {
        # code...
        Validator::replacer('phone', function($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute',$attribute, ':attribute is invalid');
        });
    }
}