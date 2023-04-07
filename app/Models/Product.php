<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = array('title', 'description', 'price');

    // Connect on [1] USERS TABLE
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
