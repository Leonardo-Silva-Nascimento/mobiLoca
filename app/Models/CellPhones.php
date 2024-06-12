<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rentals;

class CellPhones extends Model
{
    use HasFactory;

    protected $fillable = [
        'marca', 'modelo', 'lancado_em',
    ];

    // Relacionamento com o modelo Rental
    public function rentals()
    {
        return $this->hasMany(Rentals::class, 'phone_id');
    }
    public static function getAllPhones()
    {
        return self::get();
    }
}

