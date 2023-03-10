<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    public function book(Type $var = null)
    {
        return $this->hasMany(Book::class); 
    }
   
}
