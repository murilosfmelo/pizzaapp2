<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Http\Requests\StoreProdutoRequest;
use App\Http\Requests\UpdateProdutoRequest;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::orderBy('nome');

        return view('produto.index')
                            ->with(compact('produtos'));
    }


    public function create()
    {
        $produto = null;
        $tiposProduto = TipoProduto::class;
        return view('produto.form')
                            ->with(compact('produto', 'tiposProduto'));
    }


    public function store(Request $request)
    {
        $produto = Produto::create($request->all());
        return redirect()
        ->route('produto.show',['id' => $produto->id_produto])
                                                -> with('success','Cadastrado com sucesso');

    }

    public function show(int $id)
    {
        $produto = Produto::find($id);
        $tamanhos = Tamanho::class;

        return view('produto.show')
                           ->with(compact('produto', 'tamanhos'));
    }

    public function edit(int $id)
    {
        $produto = null;
        $tiposProduto = TipoProduto::class;
        return view('produto.form')
                            ->with(compact('produto', 'tiposProduto'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdutoRequest $request, Produto $produto)
    {
        $produto = Produto::find($id);
        $produto->update($request->all());

        return redirect()->route('produto.show',['id'=>$produto->id_produto])
        ->with('sucess','Atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        Produto::find($id)->delete();
        return redirect()->back()->with('danger', 'Removido com sucesso!');
    }

    /**
     * Tamanhos de produtos
     */


     public function createTamanho(int $id_produto){
        $produtoTamanho = null;
        $produto = Produto::find($id_produto);
        $tamanhos = ProdutoTamanho::class;

        return view('produto.formTamanho')
                ->with(compact('produto', 'tamanhos','produtoTamanho'));



     }
public function storetamanho(Request $request,int $id_produto){

    $produtoTamanho = ProdutoTamanho::create([


        'id_produto' => $id_produto,
        'id_tamanho' => $request->id_tamanho,
        'preco' => $request->preco,
        'observacoes'=>$request->observacoes
    ]);

    return route('produto.show',['id'=>$id_produto])->with('sucess','Tamanho cadastro com sucesso.');





}
    public function editTamanho (int $id){
        $produtoTamanho = ProdutoTamanho::find($id);
        //$produto = Produto::find($produtoTamanho->id_prduto);
        $produtoTamanho->produto();
        $tamanho = ProdutoTamanho::class;

        return view('produto.formTamanho')
                ->with(compact('produto', 'tamanhos','produtoTamanho'));


    }
    public function updateTamanho(Request $request,int $id){

        $produtoTamanho = ProdutoTamanho::find($id);
        $produtoTamanho->update($request->all());
        return redirect()->route('produto.show',['id'=>$produtoTamanho->id_produto])->with('sucess','Tamanho cadastro com sucesso.');



    }

    public function destroyTamanho(int $id){

        ProdutoTamanho::find($id)->delete();
        return redirect()->back()->with('danger','Removido com sucesso!');

    }

}
