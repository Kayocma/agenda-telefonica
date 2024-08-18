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
                <a class="nav-link text-light" href="/">Contato</a>
            </li>
        </ul>

    </nav>

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>            
        @endif
    
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-8">
                    <div class="card mt-3 p-3">
                        <h3 class="text-muted">Atualização do Contato {{ $agenda->nome }}</h3>
                        <form method="POST" action="{{ route('update', $agenda->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Nome: </label>
                                <input type="text" name="nome" class="form-control" value="{{ old('nome', $agenda->nome) }}">
                                @if ($errors->has('nome'))
                                    <span class="text-danger">{{ $errors->first('nome') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Telefone: </label>
                                <input type="text" name="telefone" class="form-control" value="{{ old('telefone', $agenda->telefone) }}">
                                @if ($errors->has('telefone'))
                                    <span class="text-danger">{{ $errors->first('telefone') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Email: </label>
                                <input type="text" name="email" class="form-control" value="{{ old('email', $agenda->email) }}">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Foto: </label>
                                @if ($agenda->imagem)
                                    <img src="{{ asset('imagens/' . $agenda->imagem) }}" class="rounded-circle" width="50" height="50" alt="Imagem Atual" style="display: block; margin-bottom: 10px;">
                                    <p>Nome da imagem: {{ $agenda->imagem }}</p>
                                    <input type="hidden" name="imagem_atual" value="{{ $agenda->imagem }}">
                                @endif
                                <input type="file" name="imagem" class="form-control">
                                @if ($errors->has('imagem'))
                                    <span class="text-danger">{{ $errors->first('imagem') }}</span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-dark">Atualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
 
</body>
</html>