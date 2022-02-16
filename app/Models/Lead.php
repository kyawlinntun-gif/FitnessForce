<?php

namespace App\Models;

use App\Models\Reminder;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = ['name', 'email', 'phone','age', 'interested_package', 'dob', 'branch_id', 'added_by'];

    public function reminders()
    {
        return $this->hasMany(Reminder::class)->orderByDesc('id');
    }
}
