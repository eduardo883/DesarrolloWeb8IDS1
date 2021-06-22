<?php

namespace App\Http\Controllers;

use App\Models\Negocios;
use Illuminate\Http\Request;

class negociosController extends Controller
{
    public function vista(){
        return view('pages.negocios');
    }

    public function listar(){
        $negocios = Negocios::all();
        return $negocios;
    }

    public function guardar(Request $request){

        $rules =[
            'nombre' => 'required|min:4',
            'descripcion' => 'required',
            'avenida' => 'required',
            'no_ext' => 'required',
            'cp' => 'numeric|max:5',
            'telefono' => 'required|max:10|numeric'
        ];

        $detalle_mensaje= [
            'nombre.required' => 'El campo nombre es requerido',
            'descripcion.required' => 'El campo descripción es requerido',
            'avenida.required' => 'El campo avenida es requerido',
            'no_ext.required' => 'El campo Número Exterior es requerido',
            'cp.required' => 'El campo código postal es requerido',
            'cp.max' => 'El campo código postal requiere un máximo de 5 carácteres',
            'telefono.required' => 'El campo teléfono es requerido',
            'telefono.required' => 'El campo teléfono debe ingresar únicamente valores númericos',
            'telefono.max' => 'El campo teléfono requiere un máximo de 10 carácteres'
        ];

        $nuevoNegocio = new Negocios();

        $nuevoNegocio->nombre = $request->nombre;
        $nuevoNegocio->descripcion = $request->descripcion;
        $nuevoNegocio->avenida = $request->avenida;
        $nuevoNegocio->no_ext = $request->no_ext;
        $nuevoNegocio->no_int = $request->no_int;
        $nuevoNegocio->cp = $request->cp;
        $nuevoNegocio->telefono = $request->telefono;

        $nuevoNegocio->save();
    }
}
