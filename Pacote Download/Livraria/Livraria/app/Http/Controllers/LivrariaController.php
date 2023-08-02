<?php

namespace App\Http\Controllers;

use App\Models\Livraria;
use Illuminate\Http\Request;
use Exception;

class LivrariaController extends Controller
{
         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livrarias = Livraria::all();
        return view('livraria.index', compact('livrarias') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('livraria.create');
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
                $livraria                = new Livraria();
                $livraria->nome_fantasia = $request->nome_fantasia;
                $livraria->razao_social  = $request->razao_social;
                $livraria->cnpj          = $request->cnpj;
                $livraria->endereco      = $request->endereco;
                $livraria->telefone      = $request->telefone;
    
                $livraria = $livraria->save();
    
                $request->session()->flash('message', 'Livraria cadastrada com sucesso');
            } catch (Exception $e) {
                $request->session()->flash('message', 'Erro ao cadastrar nova livraria! ');
            }
        }
        else
        { 
            $request->session()->flash('message', 'Operação cancelada pelo usuário'); 
        }
        return redirect()->to(route('livraria.index'));
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
        $livraria = Livraria::find($id);
        return view('livraria.edit', compact('livraria'));
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
                'nome_fantasia' => 'required',
                'cnpj'          =>'required',
                'razao_social'  => 'required',
                'endereco'      => 'required',
                'telefone'      => 'required',
            ]);
            $livraria                = Livraria::find($id);
            $livraria->nome_fantasia = $request->nome_fantasia;
            $livraria->razao_social  = $request->razao_social;
            $livraria->cnpj          = $request->cnpj;
            $livraria->endereco      = $request->endereco;
            $livraria->telefone      = $request->telefone;
            $livraria->save();
            $request->session()->flash('message', 'Livraria alterada com sucesso');
        }
        else
        { 
            $request->session()->flash('message', 'Operação cancelada pelo usuário'); 
        }
       
        return redirect()->to(route('livraria.index'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $livraria = Livraria::find($id);
        $livraria->delete();
        return redirect()->route('livraria.index')->with('message','Livraria deletada com sucesso!');
    }
}
