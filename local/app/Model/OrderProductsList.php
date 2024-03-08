<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class OrderProductsList extends Authenticatable
{
    use Notifiable;
    // Name table
    protected $table = 'db_order_products_list';

}
