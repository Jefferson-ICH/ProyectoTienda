<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PGallery extends Model
{
    //
    use SoftDeletes; //eleiminar los registros pero no de la base de datos para evitar confucion en BDD
    protected $dates =['deleted_at'];
    protected $table= 'productgallery';
    protected $hidden= ['created_at','update_at'];
}
