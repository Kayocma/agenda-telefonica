<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agendas = Agenda::all();
        return view('index', compact('agendas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'imagem' => 'required|mimes:jpg,png,jpeg|max:10000',
        ]);

        $nomeContato = str_replace(' ', '_', $request->nome);
        $imagem = $nomeContato . '.' . $request->imagem->extension();
        $request->imagem->move(public_path('imagens'), $imagem);

        Agenda::create([
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'imagem' => $imagem,
        ]);

        return redirect()->route('index')->with('success', 'Contato cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $agenda = Agenda::find($id);
        return view('edit', compact('agenda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'imagem' => 'nullable|mimes:jpg,png,jpeg|max:2048',
        ]);

        $agenda = Agenda::find($id);

        if ($request->hasFile('imagem')) {
            $nomeContato = str_replace(' ', '_', $request->nome);
            $imagem = $nomeContato . '.' . $request->imagem->extension();
            $request->imagem->move(public_path('imagens'), $imagem);
            $agenda->update([
                'imagem' => $imagem,
            ]);
        }

        $agenda->update([
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'email' => $request->email,
        ]);

        return redirect()->route('index')->with('success', 'Contato atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $agenda = Agenda::find($id);
        $agenda->delete();
        return redirect()->route('index')->with('success', 'Contato deletado com sucesso!');
    }
}