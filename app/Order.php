<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Order extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'orders';

    protected $fillable = [
        'order_num', 'order', 'status', 'pid'
    ];
    //
}
