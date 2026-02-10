<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'preco_compra',
        'preco_venda',
        'estoque_atual',
        'fornecedor'
    ];

    public function entradas()
    {
        return $this->hasMany(Entrada::class);
    }

    public function saidas()
    {
        return $this->hasMany(Saida::class);
    }
}
