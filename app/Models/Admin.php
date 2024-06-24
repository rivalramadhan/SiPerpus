<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    
   protected $table = 'admins';
   protected $primaryKey = 'id';
   protected $keyType = 'int';
   public $incrementing = true;
   public $timestamps = true;

   protected $fillable = [
    'username',
    'password',
    'admin_name',
];

}
