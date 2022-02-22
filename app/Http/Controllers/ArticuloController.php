<?php

namespace App\Http\Controllers;

use App\articulo;
use Illuminate\Http\Request;
Use Session;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos['articulo']=articulo::paginate();

    return view('Articulos.articulos',$articulos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function agregar()
    {
        return view('Articulos.AgregarArticulo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        //
        $articulo = new articulo;
        $articulo->nombrearticulo=$request->NombreArticulo;
        $articulo->descripcion=$request->Descripcion;
        $articulo->cantidad=$request->Cantidad;
        $articulo->precio=$request->Precio;
        $articulo->save();
        //return response()->json($datosClientes);
        Session::flash('message','Nuevo articulo ingresado exitosamente');
        return redirect()->route('articulos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(articulo $articulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $articulo=articulo::findOrFail($id);
        return view('Articulos.EditarArticulos',compact('articulo')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, $id)
    {
        $articulos=articulo::find($request->id);
        $articulos->nombrearticulo=$request->NombreArticulo;   
        $articulos->descripcion=$request->Descripcion;
        $articulos->cantidad=$request->Cantidad;     
        $articulos->precio=$request->Precio;
        $articulos->save();
        Session::flash('message','Articulo actualizado exitosamente');
        return redirect()->route('articulos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function eliminar(articulo $id)
    {
        //
        $id->delete();

        Session::flash('message','Se ha borrado el articulo exitosamente');
        return redirect()->route('articulos');   
    }
}
