<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\clientes;
use Illuminate\Support\Facades\Validator;
Use Session;
Use Redirect;

class cliente extends Controller
{
    //
    public function index()
	{
		$datosClientes['clientes']=clientes::paginate();

	return view('Clientes.Clientes',$datosClientes);
	}

	public function agregar()
	{

	return view('Clientes.AgregarCliente');
	}

	public function guardar(Request $request){
		//$datosClientes=request()->all();
		//$datosClientes=request()->except('_token');

		$datosClientes = new clientes;
		$datosClientes->nombres=$request->Nombres;
		$datosClientes->cedula=$request->Cedula;
		$datosClientes->telefono=$request->Telefono;
		$datosClientes->direccion=$request->Direccion;
		$datosClientes->email=$request->Email;
		$datosClientes->save();
		//return response()->json($datosClientes);
 		Session::flash('message','Nuevo cliente ingresado exitosamente');
       	return redirect()->route('clientes');

 

	}
	public function eliminar(clientes $id){
		
		
		$id->delete();

		Session::flash('message','Se ha borrado el cliente exitosamente');
       	return redirect()->route('clientes');	

	}
	public function editar($id){
		
		$clientes=clientes::findOrFail($id);
		return view('Clientes.EditarCliente',compact('clientes')); 
		
	}

	public function actualizar (Request $request, $id){

		$clientes=clientes::find($request->id);
		$clientes->nombres=$request->Nombres;	
		$clientes->cedula=$request->Cedula;		
		$clientes->telefono=$request->Telefono;
		$clientes->direccion=$request->Direccion;
		$clientes->email=$request->Email;
		$clientes->save();
		Session::flash('message','Cliente actualizado exitosamente');
       	return redirect()->route('clientes');
	}	

	
}
