@extends('layouts.app')
 
@section('content')
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Alterando Fornecedor</title>
		<!-- CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
		<!-- JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="container">
            <h2 align="center">Alterando Fornecedor</h2>
            <form action="{{ route('fornecedor.update', [$fornecedor->id]) }}" method="post" class="form-horizontal" name="frmcadastro" id="frmcadastro">
            @csrf
                <div class="form-group">
                    <label for="txtNome" class="col-sm-2 control-label">Nome Completo:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value = "{{$fornecedor->nome}}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="endereco" class="col-sm-2 control-label">Endereço:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="endereco" id="endreco" placeholder="Endereço" value = "{{$fornecedor->endereco}}"required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="telefone" class="col-sm-2 control-label">Telefone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="telefone" id="telefone" placeholder="Telefone" value = "{{$fornecedor->telefone}}"required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="Livraria" class="form-label">Livraria</label>
                    <select id="livraria_id" class="form-select" name="livraria_id" style="width:930px;">
                    
                        @foreach($livrarias as $livraria)
                            <option value="{{ $livraria->id }}">{{ $livraria->nome_fantasia }}</option>
                        @endforeach

                    </select>
                </div><br>

                <div class="form-group">
                    <label for="cnpj" class="col-sm-2 control-label">CNPJ</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="cnpj" id="cnpj" placeholder="CNPJ" value = "{{$fornecedor->cnpj}}"required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" name="save_fornecedor" value="Alterar fornecedor" class="btn btn-success">
                        <input type="submit" name="cancel" value="Cancelar" class="btn btn-info"> 
                    </div>
                </div>

            </form>            
        </div>
    </body>
</html>
@endsection