<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
         'rating',
         'id_user'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
