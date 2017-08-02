
@extends('layout/principal')

@section('conteudo')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>Novo produto</h1>

    <form action="/produtos/adiciona" method="post">

        <!-- Campo hidden usado pelo laravel para impedir ataques CSRF -->
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}"/>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" id="descricao" class="form-control" value="{{ old('descricao') }}" />
        </div>

        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="text" name="valor" id="valor" class="form-control" value="{{ old('valor') }}" />
        </div>

        <div class="form-group">
            <label for="qtd">Quantidade:</label>
            <input type="number" name="quantidade" id="quantidade" class="form-control" value="{{ old('quantidade') }}" />
        </div>

        <input type="submit" name="enviar" id="enviar" value="Enviar" class="btn btn-primary btn-block" />

    </form>
@stop
