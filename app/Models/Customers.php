<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 'sobrenome', 'email', 'senha',
    ];

    // Relacionamento com o modelo Rental
    public function rentals()
    {
        return $this->hasMany(Rentals::class, 'cliente_id');
    }
    public static function getAllCustomers()
    {
        return self::get();
    }
}
