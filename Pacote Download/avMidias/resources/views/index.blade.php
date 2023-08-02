<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<div class="container">
    <h3 style='text-align: center'>Midias</h3> <br />
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Tipo</th>
                    <th>Avalicao</th>
                </tr>
            </thead>
            <tbody>
            @foreach($midiaList as $midia)
                <tr>
                    <td>{{ $midia->id }}</td>
                    <td>{{ $midia->titulo }}</td>
                    <td>{{ $midia->tipo }}</td>
                    <td>{{ $midia->avaliacao }}</td>
                    <td>
                        <ul class="list-inline">
                            <li> <a href="{{ route('alteracao', ['id' => $midia->id]) }}">Editar</a> </li>
                            <li> <a href="{{ route('deletar', ['id' => $midia->id]) }}">Deletar</a>  </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    <div class="col-md-8"> <a href="{{ route('cadastro') }}" class="btn btn-primary">Incluir</a> </div>
</div>

