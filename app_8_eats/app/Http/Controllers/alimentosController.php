<?php

namespace App\Http\Controllers;

use App\Models\Alimentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class alimentosController extends Controller
{
    public function vistalim(){
        return view('pages.alimentos');
    }

    public function vistav(){
        return view('pages.aviso');
    }

    public function listaralim(){
        $alimentos = Alimentos::all();
        return $alimentos;
    }

    public function guardaralim(Request $request){

        $rules = [
            'nombre_a' => 'required|min:4',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'cantidad' => 'numeric'
        ];

        $detalle_mensaje = [
            'nombre_a.required' => 'El campo nombre es requerido',
            'descripcion.required' => 'El campo descripcion es requerido',
            'precio.required' => 'El campo precio es requerido',
            'nombre_a.min' => 'El campo nombre requiere por lo menos 4 caracteres',
            'precio.numeric' => 'El campo precio debe contener valores númericos'
        ];

        $this->validate($request, $rules, $detalle_mensaje);

        $nuevoAlimento = new Alimentos();

        $nuevoAlimento->nombre_a = $request->nombre_a;
        $nuevoAlimento->descripcion = $request->descripcion;
        $nuevoAlimento->precio = $request->precio;
        $nuevoAlimento->tipo = $request->tipo;
        $nuevoAlimento->cantidad = $request->cantidad;
        
        $nuevoAlimento->save();
    }
}