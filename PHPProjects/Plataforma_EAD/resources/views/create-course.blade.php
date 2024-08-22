<!-- resources/views/create-course.blade.php -->
@extends('layouts.app')

@section('title', 'Criar Curso')

@section('content')
    <div class="container">
        <h1>Criar Novo Curso</h1>
        <form method="POST" action="{{ route('cursos.store') }}">
            @csrf

            <div class="form-group">
                <label for="nome">Nome do Curso</label>
                <input id="nome" type="text" class="form-control" name="nome" required>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea id="descricao" class="form-control" name="descricao" required></textarea>
            </div>

            <div class="form-group">
                <label for="data_inicio">Data de Início</label>
                <input id="data_inicio" type="date" class="form-control" name="data_inicio" required>
            </div>

            <div class="form-group">
                <label for="data_fim">Data de Fim</label>
                <input id="data_fim" type="date" class="form-control" name="data_fim" required>
            </div>

            <div class="form-group">
                <label for="preco">Preço</label>
                <input id="preco" type="number" step="0.01" class="form-control" name="preco" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Criar Curso</button>
            </div>
        </form>
    </div>
@endsection
