<?php

namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;

class ProdutoController extends Controller {

    public function lista() {

        // DB:select sempre devolverá um array
        $produtos = Produto:all();

        return view('produto/listagem', array('produtos' => $produtos));
    }

    public function exibir($id) {

        //$id = Request::route('id');

        $produto = DB::select('select * from produtos where id = ?', [$id]);

        if (empty($produto)) {
            return "Esse produto não existe";
        }

        return view('produto.detalhes', ['p' => $produto[0]]);
    }

    public function novo() {
        return view('produto/formulario');
    }

    public function adiciona() {
        $nome = Request::input('i_nome');
        $descricao = Request::input('i_descricao');
        $valor = Request::input('i_valor');
        $qtd = Request::input('i_qtd');

        DB::insert('INSERT INTO produtos(nome, quantidade, valor, descricao) VALUES(?,?,?,?)',
            array($nome, $qtd, $valor, $descricao));

        return redirect()->action('ProdutoController@lista')->withInput(Request::only('i_nome'));
    }

    public function listaJson() {
        $produtos = DB::select('select * from produtos');

        return response()->json($produtos);
    }
}
