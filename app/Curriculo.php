<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curriculo extends Model
{
    protected $fillable = [
        'entidade', 'cnpj',

        'cep', 'logradouro', 'bairro', 'numero', 'complemento', 'cidade', 'uf', 

        'representante', 'cpf', 'email', 'cel1', 'cel2',

    ];

    protected $dates = ['created_at'];

public function anexos()
    {
        return $this->belongsTo('App\Anexo');
    }

}
