<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anexo extends Model
{
    protected $fillable = [

        'arquivoNome', 'arquivoLocal', 'arquivoUrl', 'curriculo_id' 

    ];

    protected $dates = ['created_at'];

    public function curriculos()
    {
        return $this->hasMany('App\Anexo');
    }
}
