<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Livraria;
use App\Models\Livros;
use Illuminate\Http\Request;
use Exception;

class FornecedorController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fornecedores = Fornecedor::all();
        $livrarias = Livraria::all();
        return view('fornecedor.index', compact('fornecedores', 'livrarias') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $livrarias = Livraria::all();
        return view('fornecedor.create', compact('livrarias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! $request->has('cancel') ){
            try {
                $fornecedor           = new Fornecedor();
                $fornecedor->nome     = $request->nome;
                $fornecedor->cnpj     = $request->cnpj;
                $fornecedor->endereco = $request->endereco;
                $fornecedor->telefone = $request->telefone;
    
                $fornecedor->save();
                if (isset($request['livraria_id'])) {
                    $fornecedor->livraria()->attach($request['livraria_id']);
                  }
    
                $request->session()->flash('message', 'Fornecedor cadastrado com sucesso');
            } catch (Exception $e) {
                $request->session()->flash('message', 'Erro ao cadastrar novo fornecedor! ');
            }
        }else{
            $request->session()->flash('message', 'Operação cancelada pelo usuário');
        }
        
        return redirect()->to(route('fornecedor.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fornecedor = Fornecedor::find($id);
        $livrarias = Livraria::all();
        return view('fornecedor.edit', compact('fornecedor', 'livrarias'));
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if (! $request->has('cancel') ){
            $request->validate([
                'nome'     => 'required',
                'cnpj'     => 'required',
                'endereco' => 'required',
                'telefone' => 'required',
            ]);
            $fornecedor           = Fornecedor::find($id);
            $fornecedor->nome     = $request->nome;
            $fornecedor->cnpj     = $request->cnpj;
            $fornecedor->endereco = $request->endereco;
            $fornecedor->telefone = $request->telefone;

            $fornecedor->save();

            if (isset($request['livraria_id'])) {
                $fornecedor->livraria()->attach($request['livraria_id']);
              }
              else {
                $fornecedor->livraria()->detach();
              }
            $request->session()->flash('message', 'Fornecedor alterado com sucesso');
        }
        else
        { 
            $request->session()->flash('message', 'Operação cancelada pelo usuário'); 
        }
       
        return redirect()->to(route('fornecedor.index'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fornecedor = Fornecedor::find($id);
        $fornecedor->livraria()->detach();
        $fornecedor->delete();
        return redirect()->route('fornecedor.index')->with('message','Fornecedor deletado com sucesso!');
    }
}
