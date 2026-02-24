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
        'sent_to',
        'sender_details',
        'attachment',
        'user_id',
        'status',
        'remark',
        'status_date',
    ];
}
