
@extends('layout/principal')

@section('conteudo')
    <h1>Novo produto</h1>

    <form action="/produtos/adiciona" method="post">

        <!-- Campo hidden usado pelo laravel para impedir ataques CSRF -->
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

        <div class="form-group">
            <label for="i_nome">Nome:</label>
            <input type="text" name="i_nome" id="i_nome" class="form-control" />
        </div>

        <div class="form-group">
            <label for="i_descricao">Descrição:</label>
            <input type="text" name="i_descricao" id="i_descricao" class="form-control" />
        </div>

        <div class="form-group">
            <label for="i_valor">Valor:</label>
            <input type="text" name="i_valor" id="i_valor"class="form-control" />
        </div>

        <div class="form-group">
            <label for="i_qtd">Quantidade:</label>
            <input type="number" name="i_qtd" id="i_qtd" class="form-control" />
        </div>

        <input type="submit" name="i_enviar" id="i_enviar" value="Enviar" class="btn btn-primary btn-block" />
        
    </form>
@stop
