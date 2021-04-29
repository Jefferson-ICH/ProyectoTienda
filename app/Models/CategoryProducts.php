<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryProducts extends Model
{
    //
    use SoftDeletes;

    protected $dates =['deleted_at'];
    protected $table= 'catproduct';
    protected $hidden= ['created_at','update_at'];
}
