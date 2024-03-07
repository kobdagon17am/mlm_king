<?php

namespace App\Modal;

use Illuminate\Database\Eloquent\Model;
// use App\Models\CustomerGallery;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    // use SoftDeletes;
    protected $table = 'payment';
    public $incrementing=true;


}
