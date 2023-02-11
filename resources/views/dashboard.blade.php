@extends('layouts.workarea')

@section('breadcrumb')
    <div class="page-header">
        <div class="row">
        <div class="col-sm-6">
            <h3>Bienvenido</h3>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" data-bs-original-title="" title="">Home</a></li>
            </ol>
        </div>
        </div>
    </div>
@endsection
