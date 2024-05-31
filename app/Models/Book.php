<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;

    public $timestamps = true;
    
    public $fillable = [
        'book_title',
        'author',
        'isbn',
        'book_pict',
        'release_date',  
    ];

}
