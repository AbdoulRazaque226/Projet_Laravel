<?php

namespace App\Models;
use App\Models\Dette;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

use HasFactory;

    protected $table = 'clients';

    protected $fillable = [
        'nom', 'telephone', 'adresse'];

    public function dettes()
    {
        return $this->hasMany(Dette::class);
    }
    
}

