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
        <div class="container">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-light" href="/">Lista</a>
                </li>
            </ul>
            <div class="ml-auto">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="text-sm text-white hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Logout') }}
                    </button>
                </form>
            </div>
        </div>
    </nav>

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>            
        @endif

        <!-- Conteúdo HTML existente -->
        <div class="container">
            <div id="app" class="text-right">
                <!-- Botão para abrir o modal -->
                <button @click="openModal" class="btn btn-dark mt-2">Novo Contato</button>
                <create-contact-modal ref="createContactModal"></create-contact-modal>
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
                            <td><img src="imagens/{{ $agenda->imagem }}" class="rounded-circle" width="50" height="50"/></td>
                            <td>
                                <div class="d-flex">
                                    <div>
                                        <a href="{{ route('edit', $agenda->id) }}" class="btn btn-primary flex-grow-1 mr-1">Editar</a>
                                    </div>

                                    <div>
                                        <form method="POST" class="d-inline flex-grow-1" action="{{ route('destroy', $agenda->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger w-100">Deletar</button> 
                                        </form>    
                                    </div>                        
                                </div>                           
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Adicione o script Vue.js aqui -->
        <script src="{{ mix('js/app.js') }}"></script>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    </body>
</html>