<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = "reservations";

    protected $guarded = ['id'];

    protected $hidden = ['created_at', 'updated_at'];

}
