<?php

namespace App\Models;

use App\Models\Lead;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $guarded=[];

    public function getStatusAttribute($status)
    {
        return ucfirst($status);
    }

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }
}
