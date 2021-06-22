@extends('layouts.app')

@section('content')

<div class="header bg-gradient-primary pt-5 pt-md-6">
    <div class="container-fluid">
    
        <!-- Header -->
        <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                <h6 class="h2 text-white d-inline-block mb-0">Negocios</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a>Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Negocios</li>
                    </ol>
                </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                <button type="button" class="btn btn-sm btn-neutral" id="NuevoCondominio">Nuevo Negocio</button>
                <button type="button" class="btn btn-sm btn-neutral">Recargar Negocios</button>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

<example-component />

@endsection