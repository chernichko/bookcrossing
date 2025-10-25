<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Exchange extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'requester_id', 'book_id', 'status', 'completed_at'
    ];
}
