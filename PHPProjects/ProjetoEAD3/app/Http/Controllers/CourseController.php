<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course; // Adicione esta linha para importar o modelo Course

class CourseController extends Controller
{
    /**
     * Display a listing of the courses created by the authenticated teacher.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Obtém os cursos criados pelo professor autenticado
        $courses = Course::where('teacher_id', auth()->id())->get();
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new course.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created course in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Valida os dados de entrada
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Cria um novo curso
        Course::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'teacher_id' => auth()->id(),
        ]);

        return redirect()->route('courses.index')->with('success', 'Curso criado com sucesso!');
    }
}
