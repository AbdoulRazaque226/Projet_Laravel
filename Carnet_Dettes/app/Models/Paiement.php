<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dette;

class Paiement extends Model
{
use HasFactory;
    protected $table = 'paiements';
    protected $fillable = [
    'montant_paiement',
    'date_paiement',
    'status',
    'dette_id'
];

   public function dette()
    {
        return $this->belongsTo(Dette::class, 'dette_id');
    }

}
