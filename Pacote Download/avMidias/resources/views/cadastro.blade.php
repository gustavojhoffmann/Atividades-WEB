<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Mídias</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body class="container">
    <h3 style='text-align: center'>Cadastro de Mídias</h3>
    <form class="form-signin" action="{{ route('cadastro') }}" method="post">
        @csrf
        <label for="titulo"><br />Titulo</label> <br />
        <input type="text" name="titulo" class="form-control" id=""> <br />
        <label for="tipo">Tipo</label> <br />
        <input type="radio" name="tipo" class="radius" value="1"> Livro<br />
        <input type="radio" name="tipo" class="radius" value="2"> Filme<br />
        <input type="radio" name="tipo" class="radius" value="3"> Mangá<br /> <br />
        <label for="avaliacao">Nota</label> <br />
        <input type="number" name="avaliacao" class="form-control" id=""> <br />
        <button class="btn btn-primary">Salvar</button>
    </form>
</body>
</html>