<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index(){
    	
      return view('admin.productos.index');

    }
    
    public function create(){
    	
        return view('admin.productos.create');
  
      }
}
