<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Sellers extends Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory;

    protected $fillable = [
        'nome', 'sobrenome', 'email', 'senha',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public static function getAllSellers()
    {
        return self::get();
    }
    
}
