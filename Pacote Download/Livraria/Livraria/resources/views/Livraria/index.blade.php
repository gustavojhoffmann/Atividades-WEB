@extends('layouts.app')
@section('content')
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista de Livraria</title>
		<!-- CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
		<!-- JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </head>
    <body>
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome fantasia</th>
                <th scope="col">Razão social</th>
                <th scope="col">Endereço</th>
                <th scope="col">Telefone</th>
                <th scope="col">CNPJ</th>
                </tr>
            </thead>
            <tbody>
            @foreach($livrarias as $livraria)
                <tr>
                    <td>{{ $livraria->id }}</td>
                    <td>{{ $livraria->nome_fantasia }}</td>
                    <td>{{ $livraria->razao_social }}</td>
                    <td>{{ $livraria->endereco }}</td>
                    <td>{{ $livraria->telefone }}</td>
                    <td>{{ $livraria->cnpj }}</td>
                    <td>
                        <ul class="list-inline">
                            <li> <a href="{{ route('livraria.edit', ['id' => $livraria->id]) }}">Editar</a> </li>
                            <li> <a href="{{ route('livraria.destroy', ['id' => $livraria->id]) }}">Deletar</a>  </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if(Session::has('message'))
    <div class="alert alert-sucess alert-dismissible show" role="alert">
            <strong> {!! session()->get('message') !!}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="$('.alert').alert('close')">
            <span aria-hidden="true">×</span>
            </button>
    </div>
    @endif
    <div class="col-md-8"> <a href="{{ route('livraria.create') }}" class="btn btn-primary">Incluir livraria</a> </div>
</html>
@endsection