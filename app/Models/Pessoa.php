<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $guarded = ['id'];
    
    use HasFactory;

    public function conta()
    {
        return $this->hasOne(Conta::class);
    }
}
