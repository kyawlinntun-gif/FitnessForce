<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $guarded=[];

    public function getStatusAttribute($status)
    {
        return ucfirst($status);
    }
}
