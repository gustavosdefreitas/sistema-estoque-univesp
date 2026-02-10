<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable = ['produto_id', 'quantidade', 'valor_unitario', 'valor_total', 'data', 'cliente'];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
