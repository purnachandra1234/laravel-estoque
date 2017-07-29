<?php

namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;

class ProdutoController extends Controller {

    public function lista() {

        // DB:select sempre devolverá um array
        $produtos = DB::select('select * from produtos');

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
}
