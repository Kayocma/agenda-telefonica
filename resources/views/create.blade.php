
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-8">
                    <div class="card mt-3 p-3">
                        <form method="POST" action="/store" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group form-inline">
                                <label>Nome: </label>
                                <input type="text" name="nome" class="form-control" value="{{ old('nome') }}" required>
                                @if ($errors->has('nome'))
                                    <span class="text-danger">{{ $errors->first('nome') }}</span>
                                @endif
                            </div>
                            <div class="form-group form-inline">
                                <label>Telefone: </label>
                                <input type="text" name="telefone" class="form-control" value="{{ old('telefone') }}" required>
                                @if ($errors->has('telefone'))
                                    <span class="text-danger">{{ $errors->first('telefone') }}</span>
                                @endif
                            </div>
                            <div class="form-group form-inline">
                                <label>Email: </label>
                                <input type="text" name="email" class="form-control" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group form-inline">
                                <label>Foto: </label>
                                <input type="file" name="imagem" class="form-control" required>
                                @if ($errors->has('imagem'))
                                    <span class="text-danger">{{ $errors->first('imagem') }}</span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-dark">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    