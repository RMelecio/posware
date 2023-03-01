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
                                <div class="col-2">
                                    <div class="mb-3">
                                        <label class="form-label" for="alias">Alias</label>
                                        <input class="form-control form-control-sm" id="alias" name="alias" type="text" placeholder="Alias" value="{{ old('alias') ? old('alias') : $company->alias }}">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Nombre</label>
                                        <input class="form-control form-control-sm" id="name" name="name" type="text" placeholder="Nombre" value="{{ old('name') ? old('name') : $company->name }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="trade_name">Razón Social</label>
                                        <input class="form-control form-control-sm" id="trade_name" name="trade_name" type="text" placeholder="Razón Social" value="{{ old('trade_name') ? old('trade_name') : $company->trade_name }}">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="fiscal_regime_id">Régimen Fiscal</label>
                                        <select class="form-select digits" id="fiscal_regime_id" name="fiscal_regime_id">
                                            @foreach ($fiscalRegimes as $fiscalRegime)
                                                <option value="{{ $fiscalRegime->id }}"
                                                @if ($fiscalRegime->id == $company->fiscal_regime_id)
                                                    selected
                                                @endif
                                                >{{ $fiscalRegime->regime_code . " - " . $fiscalRegime->description }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <div class="mb-3">
                                        <label class="form-label" for="country_id">Pais</label>
                                        <select class="form-select digits" id="country_id" name="country_id">
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}"
                                                @if ($country->id == $company->country_id)
                                                    selected
                                                @endif
                                                >{{ $country->country . " - " . $country->description }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="mb-3">
                                    <label class="form-label" for="state">Estado</label>
                                    <input class="form-control form-control-sm" id="state" name="state" type="text" placeholder="Estado" value="{{ old('state') ? old('state') : $company->state }}">
                                </div>
                                </div>
                                <div class="col-2">
                                    <div class="mb-3">
                                        <label class="form-label" for="municipality">Municipio</label>
                                        <input class="form-control form-control-sm" id="municipality" name="municipality" type="text" placeholder="Municipio" value="{{ old('municipality') ? old('municipality') : $company->municipality }}">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="mb-3">
                                        <label class="form-label" for="location">Localidad</label>
                                        <input class="form-control form-control-sm" id="location" name="location" type="text" placeholder="Localidad" value="{{ old('location') ? old('location') : $company->location }}">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="mb-3">
                                        <label class="form-label" for="settlement">Colonia</label>
                                        <input class="form-control form-control-sm" id="settlement" name="settlement" type="text" placeholder="Colonia" value="{{ old('settlement') ? old('settlement') : $company->settlement }}">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="mb-3">
                                        <label class="form-label" for="postal_code">Código Postal</label>
                                        <input class="form-control form-control-sm" id="postal_code" name="postal_code" type="text" placeholder="Código Postal" value="{{ old('postal_code') ? old('postal_code') : $company->postal_code }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-7">
                                    <div class="mb-3">
                                        <label class="form-label" for="address">Dirección</label>
                                        <input class="form-control form-control-sm" id="address" name="address" type="text" placeholder="Dirección" value="{{ old('address') ? old('address') : $company->address }}">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="mb-3">
                                        <label class="form-label" for="mobil">Telefóno</label>
                                        <input class="form-control form-control-sm" id="mobil" name="mobil" type="text" placeholder="Dirección" value="{{ old('mobil') ? old('mobil') : $company->mobil }}">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="email">E-mail</label>
                                        <input class="form-control form-control-sm" id="email" name="email" type="text" placeholder="Dirección" value="{{ old('email') ? old('email') : $company->email }}">
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
