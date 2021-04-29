<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    use SoftDeletes; //eleiminar los registros pero no de la base de datos para evitar confucion en BDD
    protected $dates =['deleted_at'];
    protected $table= 'products'; //nombre de la tabla de la base de datos
    protected $hidden= ['created_at','update_at'];
}
