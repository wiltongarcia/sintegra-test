@extends('layouts.app')

@section('content')

    <div class="panel-body">
        <div class="page-header">
            <h1>Cadastro</h1>
        </div>
        <!-- Display Validation Errors -->
        @include('common.errors')
        @include('common.user_form')

    </div>

@endsection
