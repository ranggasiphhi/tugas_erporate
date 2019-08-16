<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Menu extends Eloquent
{
    //
    protected $connection = 'mongodb';
    protected $collection = 'menus';
    
    protected $fillable = [
        'name', 'price'
    ];

    protected $casts = [
    	'name' => 'string',
    	'price' => 'integer'
    ]
}
