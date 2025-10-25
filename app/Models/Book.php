<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Book extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'user_id', 'title', 'author', 'category_id', 'condition', 'status', 'published_year', 'language'
    ];

}
