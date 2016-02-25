@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Cadastro</h3>
    </div>
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
        @include('common.user_form')

    </div>
</div>

@endsection
