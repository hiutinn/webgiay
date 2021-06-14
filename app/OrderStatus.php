<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $table = "order_status"; // chi dinh ten CSDL

    public $timestamps = false;
}
