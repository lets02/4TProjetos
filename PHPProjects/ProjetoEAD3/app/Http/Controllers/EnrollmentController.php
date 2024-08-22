<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment; // Adicione esta linha para importar o modelo Enrollment
use App\Models\Course; // Adicione esta linha para importar o modelo Course

class EnrollmentController extends Controller
{
    /**
     * Store a newly created enrollment in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $courseId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $courseId)
    {
        // Verifica se o curso existe
        $course = Course::findOrFail($courseId);

        // Cria uma nova inscrição
        Enrollment::create([
            'course_id' => $courseId,
            'student_id' => auth()->id(),
        ]);

        return redirect()->route('student.dashboard')->with('success', 'Inscrito com sucesso!');
    }
}
