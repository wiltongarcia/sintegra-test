@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">
        <h3 class="panel-title">Listagem</h3>
    </div>

    <!-- Table -->
    <table class="table">
        <tr>
            <td>Id</td>
            <td>Usuário</td>
            <td>CNPJ</td>
            <td>Json</td>
            <td>Delete</td>
        </tr>
        @foreach ($results as $result)
        <tr>
            <td class="col-md-1">{{ $result->id }}</td>    
            <td class="col-md-1">{{ $result->user->username }}</td>    
            <td class="col-md-2">{{ $result->cnpj }}</td>    
            <td class="col-md-6">
                <script type="text/javascript" charset="utf-8">
                    document.write(JSON.stringify(<?php echo $result->result; ?>)); 
                </script>
            </td>    
            <td class="col-md-1">
            <form action="/results/delete" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="id" id="id" value="{{ $result->id }}">
                <button type="submit" class="btn btn-lg btn-danger">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </button>
            </form>
            </td>    
        </tr>
        @endforeach
    </table>
</div>

@endsection
