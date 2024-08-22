@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Meus Cursos</h1>
    <a href="{{ route('courses.create') }}" class="btn btn-primary">Criar Novo Curso</a>
    <ul class="list-group">
        @foreach($courses as $course)
            <li class="list-group-item">
                {{ $course->title }}
                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection
