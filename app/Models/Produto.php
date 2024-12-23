<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //
    use HasFactory;

    //nome da tabela
    protected $table = 'produtos';

   public function user(){
       return $this->belongsTo(User::class, 'id_user');
   }

   public function categoria(){
    return $this->belongsTo(categoria::class, 'id_categoria');
}

}

