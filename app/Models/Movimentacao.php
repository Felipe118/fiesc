<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    protected $guarded = ['id'];
    
    use HasFactory;

    public function conta()
    {
        return $this->belongsToMany(Conta::class, 'movimentacaos','conta_id','pessoa_id');
    }
}
