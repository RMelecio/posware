@extends('layouts.workarea')

@section('breadcrumb')
    <div class="page-header">
        <div class="row">
        <div class="col-sm-6">
            <h3>Administrar Perfiles</h3>
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
                    <h5>Perfiles</h5><span>Listado de perfiles</span>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Perfil</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profiles as $key => $profile)
                                <tr>
                                    <th scope="row">{{ ++$key }}</th>
                                    <td>{{ $profile->name }}</td>
                                    <td>{{ $profile->description }}</td>
                                    <td>
                                        <form method="GET" action="{{ route('profile.edit', $profile->id) }}">
                                            <button class="btn btn-pill btn-primary btn-sm" type="submit"><i class="fa fa-pencil"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-end">
                    <form method="GET" action="{{ route('profile.create') }}">
                      <button class="btn btn-sm btn-primary" type="submit">Nuevo</button>
                    </form>
                </div>
            </div>
        </div>
</div>
@endsection
