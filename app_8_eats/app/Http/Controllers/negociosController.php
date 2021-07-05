<?php

namespace App\Http\Controllers;

use App\Models\Negocios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class negociosController extends Controller
{
    public function vista(){
        return view('pages.negocios');
    }

    public function listar(){
        $negocios = Negocios::leftjoin('alimentos','alimentos.id_negocio','=','negocios.id')
                            ->select('negocios.*','alimentos.nombre_a')
                            ->get();
        return $negocios;
    }

    public function editar(Request $request){
        $negocio = Negocios::find($request->id);

        $negocio->nombre = $request->nombre;
        $negocio->descripcion = $request->descripcion;
        $negocio->avenida = $request->avenida;
        $negocio->no_ext = $request->no_ext;
        $negocio->no_int = $request->no_int;
        $negocio->cp = $request->cp;
        $negocio->telefono = $request->telefono;

        if($request->file('archivo')->isValid()){
            $negocio->ruta_archivo = $request->file('archivo')->store('negocios','public');
        }

        $negocio->save();

    }

    public function eliminar($id_negocio){
        $negocio = Negocios::find($id_negocio);
        $negocio->delete();
    }

    public function verArchivo($id_negocio){
        
        $negocio = Negocios::find($id_negocio);

        $ruta = "public/" . $negocio->ruta_archivo;

        return Storage::download($ruta);
    }

    public function guardar(Request $request){

        $rules =[
            'nombre' => 'required|min:4',
            'descripcion' => 'required',
            'avenida' => 'required',
            'no_ext' => 'required',
            'cp' => 'required|max:5',
            'telefono' => 'required|max:10'
        ];

        $detalle_mensaje= [
            'nombre.required' => 'El campo nombre es requerido',
            'descripcion.required' => 'El campo descripción es requerido',
            'avenida.required' => 'El campo avenida es requerido',
            'no_ext.required' => 'El campo Número Exterior es requerido',
            'cp.required' => 'El campo código postal es requerido',
            'telefono.required' => 'El campo teléfono es requerido',
            'telefono.max' => 'El campo teléfono requiere un máximo de 10 carácteres'
        ];

        $this->validate($request, $rules, $detalle_mensaje);

        $nuevoNegocio = new Negocios();

        $nuevoNegocio->nombre = $request->nombre;
        $nuevoNegocio->descripcion = $request->descripcion;
        $nuevoNegocio->avenida = $request->avenida;
        $nuevoNegocio->no_ext = $request->no_ext;
        $nuevoNegocio->no_int = $request->no_int;
        $nuevoNegocio->cp = $request->cp;
        $nuevoNegocio->telefono = $request->telefono;
        if($request->file('archivo')->isValid()){
            $nuevoNegocio->ruta_archivo = $request->file('archivo')->store('negocios','public');
        }
        

        $nuevoNegocio->save();
    }
}
