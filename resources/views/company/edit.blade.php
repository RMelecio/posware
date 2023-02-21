@extends('layouts.workarea')

@section('breadcrumb')
    <div class="page-header">
        <div class="row">
        <div class="col-sm-6">
            <h3>Administrar Empresa</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('company.index') }}">Empresas</a></li>
            </ol>
        </div>
        </div>
    </div>
@endsection

@section('content')
    <form method="POST" action="{{ route('company.update', $company->id) }}">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Editar Empresa</h5>
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
                                        <input class="form-control form-control-sm" id="name" name="name" type="text" placeholder="Nombre" value="{{ old('name') ? old('name') : $company->name }}">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Alias</label>
                                        <input class="form-control form-control-sm" id="alias" name="alias" type="text" placeholder="Nombre" value="{{ old('alias') ? old('alias') : $company->alias }}">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Razón Social</label>
                                        <input class="form-control form-control-sm" id="regime_fiscal" name="regime_fiscal" type="text" placeholder="Nombre" value="{{ old('name') ? old('name') : $company->name }}">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Régimen Fiscal</label>
                                        <input class="form-control form-control-sm" id="name" name="name" type="text" placeholder="Nombre" value="{{ old('name') ? old('name') : $company->name }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            @can('company.update')
                                <button class="btn btn-sm btn-primary" type="submit">Actualizar</button>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection
