<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Midia;

class MidiasController extends Controller
{
    public function index()
    {
        $midiaList = Midia::all();
        return view('index', compact('midiaList'));
    }

    public function create() {
        return view('cadastro');
    }

    public function store(Request $request) {
        $dados = $request->all();
        Midia::create($dados);

        $request->session()->flash('message', 'Midia cadastrada com Sucesso!');
        return redirect()->to(route('index'));
    }

    public function show($id) {
        $midia = Midia::findOrFail($id);
        return view('listar', ['midia' => $midia]);
    }

    public function edit($id) {
        $midia = Midia::findOrFail($id);
        return view('editar', ['midia' => $midia]);
    }

    public function update(Request $request, $id) {
        $midia = Midia::findOrFail($id);
        $dados = $request->all();

        $midia->update($dados);
        $request->session()->flash('message', 'Midia atualizada com sucesso!');
        return redirect()->to(route('index'));;
    }

    public function delete($id) {
        $midia = Midia::findOrFail($id);
        return view('deletar', ['midia' => $midia]);
    }

    public function destroy($id) {
        $midia = Midia::findOrFail($id);
        $midia->delete();

        return redirect()->to(route('index'));
    }
}
