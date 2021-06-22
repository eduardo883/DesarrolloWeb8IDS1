<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class negociosController extends Controller
{
    public function listar(){
        return ('pages.negocios');
    }
}
