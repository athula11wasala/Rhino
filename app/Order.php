<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Order extends Authenticatable {

    use Notifiable;

    protected $table = 'orders';
    protected $primarykey = "id";
    protected $fillable = [
        'day', 'amount', 'paid_by', 'friends'
    ];
  
}
