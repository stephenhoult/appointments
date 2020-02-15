<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffMember extends Model
{
    protected $fillable = [
        'email',
        'firstname',
        'lastname',
    ];
}
