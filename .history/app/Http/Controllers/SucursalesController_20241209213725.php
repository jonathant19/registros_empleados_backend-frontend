<?php

namespace App\Http\Controllers;

use App\Models\Sucursales;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SucursalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
          if(auth()->user()->rol != 'Administrador'){
            return redirect('Inicio');
          }
    
        $sucursales = Sucursales::all();

        return view('modulos.users.Sucursales', compact('sucursales'));
    }

 
    public function AgregarSucursal(Request $request)
    {
        
        Sucursales::create([

            'nombre'=>$request->nombre,
            'estado'=>1

        ]);

          return redirect('Sucursales');
    }
    public function ActualizarSucursal(Request $request, $id_sucursal)
    {
        
        $Sucursal
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sucursales $sucursales)
    {
        //
    }
}
