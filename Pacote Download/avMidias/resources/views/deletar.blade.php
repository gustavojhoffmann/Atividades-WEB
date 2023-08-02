<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir uma Mídia</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body class="container">
    <h3 style='text-align: center'>Deletar Mídia</h3>
    <form class="form-signin" action="{{ route('deletar', ['id' => $midia->id]) }}" method="post">
        @csrf
        <label for=""> <br /> Tem certeza que deseja excluir esta mídia?</label> <br />
        <input type="text" name="titulo" class="form-control" value="{{ $midia->titulo }}"> <br />
        <button class="btn btn-primary">Sim</button>
    </form>
</body>
</html>