<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'customer_id',
        'staff_member_id',
        'service_id',
        'date',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function staffMember()
    {
        return $this->belongsTo(StaffMember::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

}
