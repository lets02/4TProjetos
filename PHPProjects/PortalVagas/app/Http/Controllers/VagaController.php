<?php

namespace App\Http\Controllers;

use App\Models\Vaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VagaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresa = Auth::user()->empresa;
        $vagas = Vaga::when($empresa, function ($query, $empresa){
            return $query->where('empresa', 'like', $empresa);});
        return view('vagas.index',compact('vagas'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vaga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = $request->validate([
        'titulo'=> 'required|max:100',
        'descricao'=> 'required',
        'localizacao'=> 'required',
        'salario'=> 'required|numeric',
        'empresa'=> 'required'
        ]);
        Vaga::create($dados);

        return redirect()->route('vagas.index')
        ->with('suceess', 'Vaga criado com Sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vaga $vaga)
    {
        return view('vagas.edit', compact('vaga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vaga $vaga)
    {
        $dados = $request->validate([
        'titulo'=> 'required|max:100',
        'descricao'=> 'required',
        'localizacao'=> 'required',
        'salario'=> 'required|numeric',
        'empresa'=> 'required'
        ]);
        $vaga->update($dados);

        return redirect()->route('vagas.index')
        ->with('suceess', 'Vaga Atualizada com Sucesso');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vaga $vaga)
    {
        $vaga->delete($vaga);

        return redirect()->route('vagas.index')
        ->with('suceess', 'Vaga Deletada com sucesso.');
    }
}
