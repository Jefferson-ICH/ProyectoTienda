<?php

namespace App\Http\Controllers;

use App\Estados;
use Illuminate\Http\Request;

class EstadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['estados']=Estados::paginate(4);
        return view('estados.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('estados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    //$datosEstado=request()->all();
$datosEstado=request()->except('_token');
Estados::insert($datosEstado);

        //return response() ->json($datosEstado);
        return redirect ('estados')->with('Mensaje','Estado Agregado Crrectamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estados  $estados
     * @return \Illuminate\Http\Response
     */
    public function show(Estados $estados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estados  $estados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $estado =Estados::findOrFail($id); 
        return view('estados.edit',compact('estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estados  $estados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosEstado=request()->except(['_token','_method']);
        Estados::where('id','=',$id)->update($datosEstado);
        //$estado =Estados::findOrFail($id); 
        //return view('estados.edit',compact('estado'));
        return redirect ('estados')->with('Mensaje','Estado Modificado Crrectamente');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estados  $estados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $estado =Estados::findOrFail($id); 
        Estados::destroy($id);
    
        //return redirect ('estados');
        return redirect ('estados')->with('Mensaje','Estado Eliminado');
    }
}
