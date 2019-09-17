<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendaItens extends Model
{
    protected $fillable = [
        "venda",
        "item",
        "quantidade"
    ];
}
