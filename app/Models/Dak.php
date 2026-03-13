<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dak extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'type',
        'letter_from',
        'received_date',
        'letter_number',
        'reference_number',
        'subject',
        'priority_days',
        'sent_to',
        'sender_details',
        'attachment',
        'user_id',
        'status',
        'remark',
        'status_date',
    ];


    public function assignments()
    {
        return $this->hasMany(Dak_History::class);
    }

    public function currentUser()
    {
        return $this->belongsTo(User::class, 'current_user_id');
    }

    public function histories()
    {
        return $this->hasMany(Dak_History::class, 'dak_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
