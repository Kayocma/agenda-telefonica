<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

        <title>CRUD-Agenda</title>

    </head>
    <body>

    <nav class="navbar navbar-expand-sm bg-dark">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-light" href="/">Lista</a>
            </li>
        </ul>

    </nav>

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>            
        @endif
            <div class="container">
            <div class="text-right">
                <a href="create" class="btn btn-dark mt-2">Novo Contato</a>
            </div>
            <table class="table table-hover mt-2">
                <thead>
                    <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Imagem</th>
                    <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($agendas as $agenda)
                        <tr>
                            <td>{{ $agenda->nome }}</td>
                            <td>{{ $agenda->telefone }}</td>
                            <td>{{ $agenda->email }}</td>
                            <td><img src="imagens/{{ $agenda->imagem }}" class="rounded-circle" width="50" heigth="50"/></td>
                            <td>
                                <a href="{{ route('edit', $agenda->id) }}" class="btn btn-primary">Editar</a>
                                
                                <form method="POST" class="d-inline" action="{{ route('destroy', $agenda->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Deletar</button> 
                                </form>                            
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>