<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\Paiement;
class Dette extends Model
{
    use HasFactory;

    // 👇 On force Laravel à utiliser la table "dette" (au singulier)
    protected $table = 'dettes';

    protected $fillable = [
        'produit',
        'montant',
        'date',
        'montant_restant',
        'client_id',
    ];



    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }

   
  

}
