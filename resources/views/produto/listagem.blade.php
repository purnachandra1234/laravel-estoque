
@extends('layout.principal')

@section('conteudo')

    @if (old('nome'))
        <div class="alert alert-success">
            <strong>Sucesso!</strong> O produto {{ old('i_nome') }} foi adicionado.
        </div>
    @endif

    @if(empty($produtos))
        <div class="alert alert-danger">
            Você não tem nenhum produto cadastrado.
        </div>
    @else

        <h1>Listagem de produtos</h1>

        <table class="table table-striped table-bordered table-hover">
            @foreach ($produtos as $p)
                <tr class="{{ $p->quantidade <= 1 ? 'danger' : '' }}">
                    <td>{{ $p->nome }}</td>
                    <td>{{ $p->valor }}</td>
                    <td>{{ $p->descricao }}</td>
                    <td>{{ $p->quantidade }}</td>
                    <td>
                        <a href="{{action('ProdutoController@exibir', $p->id)}}" title="Detalhar produto">
                            <span class="glyphicon glyphicon-search"></span>
                        </a>
                        
                        <a href="{{action('ProdutoController@excluir', $p->id)}}" title="Excluir produto">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif

    <h4>
        <span class="label label-danger pull-right">
            Um ou menos itens no estoque
        </span>
    </h4>

@stop
