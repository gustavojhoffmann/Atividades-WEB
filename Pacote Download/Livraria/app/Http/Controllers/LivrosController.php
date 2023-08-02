<?php

namespace App\Http\Controllers;

use App\Models\Livros;
use App\Models\Livraria;
use Illuminate\Http\Request;
use Exception;

class LivrosController extends Controller
{
         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livros = Livros::all();
        $livrarias = Livraria::all();
        return view('livros.index', compact('livros', 'livrarias') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $livrarias = Livraria::all();
        return view('livros.create', compact('livrarias'));
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
            
                $livros                 = new Livros();
                $livros->titulo         = $request->titulo;
                $livros->qtd_paginas    = $request->qtd_paginas;
                $livros->autor          = $request->autor;
                $livros->ano_publicacao = $request->ano_publicacao;
                $livros->genero         = $request->genero;
                
                $livros->save();

                if (isset($request['livraria_id'])) {
                    $livros->livraria()->attach($request['livraria_id']);
                  }

                $request->session()->flash('message', 'Livro cadastrado com sucesso');
            
        }
        else
        { 
            $request->session()->flash('message', 'Operação cancelada pelo usuário'); 
        }
        return redirect()->to(route('livros.index'));
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
        $livro = livros::find($id);
        $livrarias = Livraria::all();
        return view('livros.edit', compact('livro', 'livrarias'));
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
                'titulo'         => 'required',
                'qtd_paginas'    => 'required',
                'autor'          => 'required',
                'ano_publicacao' => 'required',
                'genero'         => 'required'
            ]);
            $livro                 = livros::find($id);
            $livro->titulo         = $request->titulo;
            $livro->qtd_paginas    = $request->qtd_paginas;
            $livro->autor          = $request->autor;
            $livro->ano_publicacao = $request->ano_publicacao;
            $livro->genero         = $request->genero;

            $livro->save();

            if (isset($request['livraria_id'])) {
                $livro->livraria()->attach($request['livraria_id']);
              }
              else {
                $livro->livraria()->detach();
              }
            $request->session()->flash('message', 'Livro alterado com sucesso');
        }
        else
        { 
            $request->session()->flash('message', 'Operação cancelada pelo usuário'); 
        }
       
        return redirect()->to(route('livros.index'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $livro = Livros::find($id);
        $livro->livraria()->detach();
        $livro->delete();
        return redirect()->route('livros.index')->with('message','Livro deletado com sucesso!');
    }
}
