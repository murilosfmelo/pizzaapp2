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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdutoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        //
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


     public function createTamanho(){

        $produto = Produto::find($id_produto);
        $tamanhos = ProdutoTamanho::class;

        return view('produto.formTamanho')
                ->with(compact('produto', 'tamanhos'));



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

    }

}
