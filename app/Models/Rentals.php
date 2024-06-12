<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customers;
use App\Models\CellPhones;

class Rentals extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'phone_id',
        'valor_mensal',
        'iniciado_em',
        'expira_em',
        'status',
    ];

    public function cliente()
    {
        return $this->belongsTo(Customers::class, 'cliente_id');
    }

    public function phone()
    {
        return $this->belongsTo(CellPhones::class, 'phone_id');
    }
    public static function getActiveRentals()
    {
        return self::with('phone', 'cliente')
            ->get();
    }


}


