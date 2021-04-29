<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator,Str;

use App\Models\CategoryProducts;

class CategoryProductController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index($module)
    {
        $cats =CategoryProducts::where ('module',$module)->orderBy('name','Asc')->get();
    	$data=['cats'=> $cats];
      return view('admin.categoriesProducts.index', $data);
    }
    public function create(Request $request)
    {
        $rules=[
    		'name'=>'required',
    		'icon'=>'required'

    	];
    	$messages=[
    		'name.required'=>'Se requiere nombre de la categoría',
    		'icon.required'=>'Se requiere el icono para la categoria'

    	];

        $validator= Validator::make($request->all(),$rules,$messages);

    	$validator= Validator::make($request->all(),$rules,$messages);  
    	if($validator->fails()):
        	return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');
        else:
        	$c = new CategoryProducts;
        	$c->module=$request->input('module');
        	$c->name=e($request->input('name'));
        	$c->slug=Str::slug($request->input('name'));
        	$c->icono=e($request->input('icon'));
        	if($c->save()):
        	return back()->with('message','Se ha guardado con éxito')->with('typealert','info');
        endif;
        endif;

    
    }

    public function getEdit($id){  //pasamos el parametro del route admin como variable
    	$cat = CategoryProducts::find($id);
    	$data =['cat'=> $cat];
    	return view('admin.categoriesProducts.edit',$data);
    }

    public function postEdit(Request $request, $id){ //editar la informacion de la categoria
    	$rules=[
    		'name'=>'required',
    		'icon'=>'required'

    	];
    	$messages=[
    		'name.required'=>'Se requiere nombre de la categoría',
    		'icon.required'=>'Se requiere el icono para la categoria'

    	];
    	$validator= Validator::make($request->all(),$rules,$messages);

    	$validator= Validator::make($request->all(),$rules,$messages);  
    	if($validator->fails()):
        	return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');
        else:
        	$c = CategoryProducts::find($id);
        	$c->module=$request->input('module');
        	$c->name=e($request->input('name'));
        	//$c->slug=Str::slug($request->input('name')); //opcional ,los enlaces 
        	$c->icono=e($request->input('icon'));
        	if($c->save()):
        	return back()->with('message','Se ha guardado con éxito')->with('typealert','info');
        endif;
        endif;

    }

    public function delete($id){  //pasamos el parametro del route admin como variable
    	$c = CategoryProducts::find($id);
    	if($c->delete()):
        	return back()->with('message','Se ha eliminado con éxito')->with('typealert','info');
        endif;
    }

}
