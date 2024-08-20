<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function __construct()
    {
        // Aplicando middleware para garantir que o usuário esteja autenticado
        // $this->middleware('auth');
    }

    public function index()
    {
        // Obtendo todos os cursos
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        // Retornando a view para criar um novo curso
        return view('courses.create');
    }

    public function store(Request $request)
    {
        // Validando os dados recebidos
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Criando um novo curso com os dados validados
        Course::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'teacher_id' => Auth::id(), // Associando o curso ao professor autenticado
        ]);

        // Redirecionando para a lista de cursos
        return redirect()->route('courses.index');
    }

    public function show(Course $course)
    {
        // Retornando a view para exibir um curso específico
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        // Retornando a view para editar um curso específico
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        // Validando os dados recebidos
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Atualizando o curso com os dados validados
        $course->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
        ]);

        // Redirecionando para a lista de cursos
        return redirect()->route('courses.index');
    }

    public function destroy(Course $course)
    {
        // Excluindo o curso
        $course->delete();

        // Redirecionando para a lista de cursos
        return redirect()->route('courses.index');
    }
}
