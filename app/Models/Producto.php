<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    //
    use SoftDeletes; //eleiminar los registros pero no de la base de datos para evitar confucion en BDD
    protected $dates =['deleted_at'];
    protected $table= 'products'; //nombre de la tabla de la base de datos
    protected $hidden= ['created_at','update_at'];

    public function cat(){
    	return $this->hasOne(CategoryProducts::class, 'id','catproduct_id'); ///relacionara has one a una categoria un producto
	}
    public function getGallery(){
		return $this->hasMany(PGallery::class,'product_id','id');
	}
}
