@extends('layouts.workarea')

@section('breadcrumb')
    <div class="page-header">
        <div class="row">
        <div class="col-sm-6">
            <h3>Administrar Perfiles</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('profile.index') }}">Perfiles</a></li>
            </ol>
        </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
        <div class="card">
                  <div class="card-header pb-0">
                    <h5>Perfil</h5>
                  </div>
                  <form class="form theme-form">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-3">
                          <div class="mb-3">
                            <label class="form-label" for="name">Nombre</label>
                            <input class="form-control form-control-sm" id="name" type="text" placeholder="Nombre" value="{{ $profile->name }}">
                          </div>
                        </div>
                        <div class="col-9">
                          <div class="mb-3">
                            <label class="form-label" for="description">Descripción</label>
                            <input class="form-control form-control-sm" id="description" type="text" placeholder="Descripción" value="{{ $profile->description }}">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button class="btn btn-sm btn-danger" type="reset">Eliminar</button>
                      <button class="btn btn-sm btn-light" type="reset">Limpiar</button>
                      <button class="btn btn-sm btn-primary" type="submit">Guardar</button>
                    </div>
                  </form>
                </div>
        </div>
    </div>
@endsection
