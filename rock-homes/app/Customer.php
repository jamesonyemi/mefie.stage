<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use Notifiable;
    protected $table = 'customers';

    protected $dates = ['created_at', 'updated_at', 'date_of_account_activation',
    'pricing_plan_expiry_date', ];



}