@extends('layouts.app')
 
@section('content')
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Alterando Livro</title>
		<!-- CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
		<!-- JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="container">
            <h2 align="center">Alterando livro</h2>
            <form action="{{ route('livros.update', [$livro->id]) }}" method="post" class="form-horizontal" name="frmcadastro" id="frmcadastro">
            @csrf
                <div class="form-group">
                    <label for="titulo" class="col-sm-2 control-label">Título:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Título" value = "{{$livro->titulo}}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="qtd_paginas" class="col-sm-2 control-label">Qtd Páginas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="qtd_paginas" id="qtd_paginas" placeholder="Qtd paginas" value = "{{$livro->qtd_paginas}}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="autor" class="col-sm-2 control-label">Autor:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="autor" id="autor" placeholder="autor" value = "{{$livro->autor}}"required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="ano_publicacao" class="col-sm-2 control-label">Ano publicação</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="ano_publicacao" id="ano_publicacao" placeholder="Ano publicação" value = "{{$livro->ano_publicacao}}"required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="genero" class="col-sm-2 control-label">Gênero</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="genero" id="genero" placeholder="genero" value = "{{$livro->genero}}"required>
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
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" name="save_livro" value="Alterar livro" class="btn btn-success">
                        <input type="submit" name="cancel" value="Cancelar" class="btn btn-info"> 
                    </div>
                </div>

            </form>            
        </div>
    </body>
</html>
@endsection