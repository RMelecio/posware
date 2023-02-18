@extends('layouts.workarea')

@section('breadcrumb')
    <div class="page-header">
        <div class="row">
        <div class="col-sm-6">
            <h3>Administrar Departamentos</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('department.index') }}">Departamentos</a></li>
            </ol>
        </div>
        </div>
    </div>
@endsection

@section('content')
    <form method="POST" action="{{ route('department.update', $department->id) }}">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Editar Departamento</h5>
                    </div>
                    <div class="form theme-form">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    <button class="btn-close" type="button" data-bs-dismiss="alert"></button>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Nombre</label>
                                        <input class="form-control form-control-sm" id="name" name="name" type="text" placeholder="Nombre" value="{{ old('name') ? old('name') : $department->name }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            @can('department.delete')
                                <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#deleteModal">Eliminar</button>
                            @endcan
                            @can('department.update')
                                <button class="btn btn-sm btn-primary" type="submit">Actualizar</button>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection

@section('modals')
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog danger" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Departamento</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">¿Está seguro que desea <strong>eliminar</strong> el perfil <strong>{{ $department->name }}</strong>?</div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary" type="button" data-bs-dismiss="modal">Cerrar</button>
                    <form method="POST" action="{{ route('department.destroy', $department->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
