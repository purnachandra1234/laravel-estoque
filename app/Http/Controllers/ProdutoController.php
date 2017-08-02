<?php

namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
use estoque\Produto;
use Validator;
use estoque\Http\Requests\ProdutosRequest;

class ProdutoController extends Controller {

    public function lista() {

        // DB:select sempre devolverá um array
        $produtos = Produto::all();

        return view('produto/listagem', array('produtos' => $produtos));
    }

    public function exibir($id) {

        $produto = Produto::find($id);

        if (empty($produto)) {
            return "Esse produto não existe";
        }

        return view('produto.detalhes', ['p' => $produto]);
    }

    public function novo() {
        return view('produto/formulario');
    }


    public function adiciona(ProdutosRequest $request) {
        Produto::create($request->all());

        return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));
    }

    public function listaJson() {
        $produtos = Produto::all();

        return response()->json($produtos);
    }

    public function excluir($id) {
        $produto = Produto::find($id);
        $nome = $produto->nome;
        $produto->delete();

        return redirect()->action('ProdutoController@lista')->with('nome', $nome);
    }
}
