<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryProducts, App\Models\Producto, App\Models\PGallery;
use Validator,Str,Config,Image;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index(){
    	$products =Producto::with(['cat'])->OrderBy('id','desc')->paginate(10); //pasar un arreglo conla cantidad de informacion para optimizar las consultas,tiempod e respuesta
      $data=['products'=> $products];
      return view('admin.productos.index',$data);

    }
    
    public function create(){
      $cats =CategoryProducts::where('module','0')->pluck('name','id');
      $data=['cats'=>$cats];
       return view('admin.productos.create',$data);
  
      }

      public function postcreate(Request $request){
        $rules =[
          'name'=>'required',
          'img' =>'required',
          'price'=>'required',
          'content'=>'required'
        ];
    
        $messages =[
          'name.required'=>'El nombre del producto es requerido',
          'img.required'=>'Seleccione una imagen ',
          'img.image'=>'El archivo no es una imagen',
          'price.required'=>'El precio es requerido',
          'content.required'=>'Ingrese una descripción del producto '
        ];
    
        $validator= Validator::make($request->all(),$rules,$messages);  
          if($validator->fails()):
              return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();
            else:
              $path ='/'.date('Y-m-d');    ///guardar las imagenes en el folder con el nombre de las fechas
              $fileExt = $request->file('img')->getClientOriginalExtension();  //trim elimina los espacions y  valida la extension de larchivo
              $upload_path= Config::get('filesystems.disks.uploads.root');  //esta asignacion de sistema de archivos en la rutadelproyecto //C:/laragon/www/cms/public/uploads aqui se fuarda el archivo
              $name=Str::slug(str_replace($fileExt, '', $request->file('img')->getClientOriginalName()));
              $file_name=rand(1,999).'-'.$name.'.'.$fileExt;
              $file_file=$upload_path.'/'.$path.'/'.$file_name;          
             
              $product =new Producto;
              $product->status='0';
              $product->name=e($request->input('name'));     //los nombres de los atricutos de la base de datos
              $product->slug=Str::slug($request->input('name'));
              $product->catproduct_id=e($request->input('category'));
              $product->image=$file_name;
              $product->file_path=date('Y-m-d');
              $product->price=($request->input('price'));
              $product->in_discount=($request->input('indiscount'));
              $product->discount=($request->input('discount'));
              $product->content=e($request->input('content'));
    
              if ($product-> save()):
                if ($request ->hasFile('img')): 
                  $f1=$request->img->storeAs($path,$file_name,'uploads'); //crear una variable y guardar los archivos
                  $img =Image::make($file_file);
                  $img->fit(256,256,function($constraint){
                      $constraint->upsize();
                  });    //tamaño de la vista miniatura
                  $img->save($upload_path.'/'.$path.'/t_'.$file_name);
            endif;
                
                return redirect(('admin/productos'))->with('message','El producto se guardo con éxito')->with('typealert','success');
              endif;
              //guardar la imagen del archivo en la base de datos
            endif;
      }

      public function getEdit($id){  //editar el prodyucto
        $p=Producto::findOrFail($id); //busca el registro con el identificador
        $cats =CategoryProducts::where('module','0')->pluck('name','id');
        $data=['cats'=>$cats,'p'=>$p];
        return view('admin.productos.edit', $data);
       }

       public function postEdit(Request $request, $id){  //editar el prodyucto
        $rules =[
         'name'=>'required',
         'price'=>'required',
         'content'=>'required'
       ];
   
       $messages =[
         'name.required'=>'El nombre del producto es requerido',
         'img.image'=>'El archivo no es una imagen',
         'price.required'=>'El precio es requerido',
         'content.required'=>'Ingrese una descripción del producto '
       ];
   
       $validator= Validator::make($request->all(),$rules,$messages);  
       if($validator->fails()):
         return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();
         else:        
            
           $product = Producto::findOrFail($id);
           $ipp=$product->file_path;//guaradar donde se gurada el archivo
           $ip=$product->image;
           $product->status=$request->input('status');
           $product->name=e($request->input('name'));     //los nombres de los atricutos de la base de datos
           $product->catproduct_id=e($request->input('category'));
             if ($request ->hasFile('img')): 
               $path ='/'.date('Y-m-d');    ///guardar las imagenes en el folder con el nombre de las fechas
               $fileExt = $request->file('img')->getClientOriginalExtension();  //trim elimina los espacions y  valida la extension de larchivo
               $upload_path= Config::get('filesystems.disks.uploads.root');  //esta asignacion de sistema de archivos en la rutadelproyecto //C:/laragon/www/cms/public/uploads aqui se fuarda el archivo
               $name=Str::slug(str_replace($fileExt, '', $request->file('img')->getClientOriginalName()));
               $file_name=rand(1,999).'-'.$name.'.'.$fileExt;
               $file_file=$upload_path.'/'.$path.'/'.$file_name;
               $product->image=$file_name;
               $product->file_path=date('Y-m-d');
             endif;
               $product->price=($request->input('price'));
               $product->in_discount=($request->input('indiscount'));
               $product->discount=($request->input('discount'));
               $product->content=e($request->input('content'));
               if ($product-> save()):
                   if ($request ->hasFile('img')): 
                         $f1=$request->img->storeAs($path,$file_name,'uploads'); //crear una variable y guardar los archivos
                         $img =Image::make($file_file);
                         $img->fit(256,256,function($constraint){
                             $constraint->upsize();
                         });    //tamaño de la vista miniatura
                         $img->save($upload_path.'/'.$path.'/t_'.$file_name);
                         unlink($upload_path.'/'.$ipp.'/'.$ip);
                         unlink($upload_path.'/'.$ipp.'/t_'.$ip);
                   endif;
                 return back()->with('message','Producto Actualizado con éxito')->with('typealert','success');
               endif;
             endif;//guardar la imagen del archivo en la base de datos
         
       }

      public function postProductGalleryCreate(Request $request,$id){

        $rules =[
         'file_image'=>'required'
       ];
   
       $messages =[
         'file_image.required'=>'La imagen requerido'    ];
   
       $validator= Validator::make($request->all(),$rules,$messages);  
         if($validator->fails()):
             return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();
           else:
             if($request->hasFile('file_image')):
               $path ='/'.date('Y-m-d');    ///guardar las imagenes en el folder con el nombre de las fechas
               $fileExt = $request->file('file_image')->getClientOriginalExtension();  //trim elimina los espacions y  valida la extension de larchivo
               $upload_path= Config::get('filesystems.disks.uploads.root');  //esta asignacion de sistema de archivos en la rutadelproyecto //C:/laragon/www/cms/public/uploads aqui se fuarda el archivo
               $name=Str::slug(str_replace($fileExt, '', $request->file('file_image')->getClientOriginalName()));
               
               $file_name=rand(1,999).'-'.$name.'.'.$fileExt;
               $file_file=$upload_path.'/'.$path.'/'.$file_name;
             
   
               $g=new PGallery;
               $g->product_id=$id;
               $g->file_path=date('Y-m-d');
               $g->file_name=$file_name;
   
                  if ($g-> save()):
                     if ($request ->hasFile('file_image')): 
                           $f1=$request->file_image->storeAs($path,$file_name,'uploads'); //crear una variable y guardar los archivos
                           $img =Image::make($file_file);
                           $img->fit(256,256,function($constraint){
                               $constraint->upsize();
                           });    //tamaño de la vista miniatura
                           $img->save($upload_path.'/'.$path.'/t_'.$file_name);
                     endif;
                     
                   return back()->with('message','Imagen subida con éxito')->with('typealert','success');
                 endif;
             endif;
         endif;
      }
   
      

        public function delete($id){  //pasamos el parametro del route admin como variable
          $c = Producto::find($id);
          if($c->delete()):
              return back()->with('message','Se ha eliminado con éxito')->with('typealert','info');
            endif;
        }
}
