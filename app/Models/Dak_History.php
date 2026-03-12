<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dak_History extends Model
{
    protected $fillable = [

        'dak_id',
        'assigned_by',
        'assigned_to',
        'remark',
        'pickup_date'

    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function dak()
    {
        return $this->belongsTo(Dak::class, 'dak_id');
    }

    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }
}

