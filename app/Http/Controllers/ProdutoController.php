<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Marca;

class ProdutoController extends Controller
{
    public function index() {

        //$produtos = Produto::all()->toArray();

        $produtos = Produto::select("produto.id",
                                    "produto.nome",
                                    "produto.quantidade",
                                    "produto.preco",
                                    "produto.descricao AS desc",
                                    "marca.nome AS mar",
                                    "categoria.nome AS cat",)
                    ->join("marca", "marca.id", "=", "produto.id_marca")
                    ->join("categoria", "categoria.id", "=", "produto.id_categoria")
                    ->get();

        return view("Produto.index",[
            "produtos" => $produtos
        ]);
    }

    public function inserir() {
        $categorias = Categoria::all()->toArray();
        $marcas = Marca::all()->toArray();
        return view("Produto.inserir", [ 'categorias' => $categorias, 'marcas' => $marcas ]);
    }

    public function salvar_novo(Request $request) {

        $produto = new Produto();

        $produto->nome = $request->input("nome");
        $produto->id_categoria = $request->input("id_categoria");
        $produto->id_marca = $request->input("id_marca");
        $produto->preco = $request->input("preco");
        $produto->quantidade = $request->input("quantidade");
        $produto->descricao = $request->imput("descricao");

        $produto->save();

        return redirect()->to("produto");
    }

    public function excluir($id) {
        $produto = Produto::find($id);

        if (!$produto) {
            return redirect()->route('produto.index')->with('error', 'Produto não encontrado');
        }

        $produto->delete();

        return redirect()->route('produto.index')->with('success', 'Produto excluído com sucesso');
    }

    public function alterar($id)
    {
        $produto = Produto::find($id)->toArray();
        return View("produto.formulario",[ 'produto' => $produto ]);
    }

    public function salvar_update(Request $request)
    {
        $id = $request->input("id");
        $produto = Produto::find($id);

        $produto->nome = $request->input("nome");
        $produto->id_categoria = $request->input("id_categoria");
        $produto->id_marca = $request->input("id_marca");
        $produto->preco = $request->input("preco");
        $produto->quantidade = $request->input("quantidade");
        $produto->descricao = $request->input("descricao");

        $produto->save();

        return redirect()->to("/produto");
    }
}
