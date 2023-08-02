<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Mídias</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <label for="titulo"><br />Titulo</label> <br />
    <input type="text" name="titulo" class="form-control" value="{{ $midia->titulo }}"> <br />
    <label for="tipo">Tipo</label> <br />
    <input type="radio" name="tipo" class="radius" value="{{ $midia->tipo }}"> Livro<br />
    <input type="radio" name="tipo" class="radius" value="{{ $midia->tipo }}"> Filme<br />
    <input type="radio" name="tipo" class="radius" value="{{ $midia->tipo }}"> Mangá<br /> <br />
    <label for="avaliacao">Nota</label> <br />
    <input type="number" name="avaliacao" class="form-control" value="{{ $midia->avaliacao }}"> <br />
</body>
</html>
