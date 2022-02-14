<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = ['name', 'email', 'phone','age', 'interested_package', 'dob', 'branch_id', 'added_by'];
}
