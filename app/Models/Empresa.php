<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'nome_fantasia', 'razao_social', 'cnpj',
        'endereco', 'telefone', 'email', 'logo'
    ];
}
