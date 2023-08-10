<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customers_address_delivery extends Authenticatable
{
    use Notifiable;
    // Name table
    protected $table = 'customers_address_delivery';
    // guarded
    protected $guarded = [];
}
