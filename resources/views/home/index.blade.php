@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Pesquisa</h3>
    </div>
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
        @include('common.result_form')

    </div>
</div>

@endsection
