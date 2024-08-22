<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use Illuminate\Support\Facades\Auth;

class CursoController extends Controller
{
    public function create()
    {
        return view('create-course');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
            'preco' => 'required|numeric|min:0',
        ]);

        Curso::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'data_inicio' => $request->input('data_inicio'),
            'data_fim' => $request->input('data_fim'),
            'preco' => $request->input('preco'),
            'professor_id' => Auth::guard('professor')->user()->id,
        ]);

        return redirect()->route('professor.dashboard')->with('status', 'Curso criado com sucesso!');
    }
}
