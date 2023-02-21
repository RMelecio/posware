@extends('layouts.workarea')

@section('breadcrumb')
    <div class="page-header">
        <div class="row">
        <div class="col-sm-6">
            <h3>Administrar Empresas</h3>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
            </ol>
        </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Empresas</h5><span>Listado de empresas</span>
                </div>
                @if(isset($success))
                    <div class="alert alert-primary dark alert-dismissible fade show" role="alert">
                        {{ $success }}
                        <button class="btn-close" type="button" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Empresa</th>
                                <th scope="col">Alias</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $key => $company)
                                <tr>
                                    <th scope="row">{{ ++$key }}</th>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->alias }}</td>
                                    <td>
                                        <form method="GET" action="{{ route('company.edit', $company->id) }}">
                                            <button class="btn btn-pill btn-primary btn-sm" type="submit"><i class="fa fa-pencil"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @can('company.create')
                    <div class="card-footer text-end">
                        <form method="GET" action="{{ route('company.create') }}">
                        <button class="btn btn-sm btn-primary" type="submit">Nuevo</button>
                        </form>
                    </div>
                @endcan
            </div>
        </div>
</div>
@endsection
