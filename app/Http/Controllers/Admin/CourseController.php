<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;

class CourseController extends Controller
{
    public function __construct(Course $course)
    {
        $this->course = $course;
    }


    public function index()
    {
        $courses = $this->course->latest('id')->paginate();
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $data = new Course();
        $input = $request->all();

        $rules = [
            'name' => 'required|max:191'
        ];

        $custom = [
            'name.required' => 'O campo nome é obrigatório',
            'name.max' => 'O campo nome deve conter no máximo 191 caractéres'
        ];

        $validator = Validator::make($request->all(), $rules, $custom);

        if ($validator->fails()) {
            return redirect()
                ->route('courses.create')
                ->withErrors($validator)
                ->withInput();
        }

        if (!empty($request->status)) {
            $input['status'] = 1;
        } else {
            $input['status'] = 0;
        }

        $data->fill($input)->save();

        return redirect(route('courses.index'))->with('status', 'Curso criado com sucesso!');
    }

    public function show($id)
    {
        $course = $this->course->findOrFail($id);

        if (!$course) {
            return redirect()->back();
        }

        return view('admin.courses.show', compact('course'));
    }

    public function edit($id)
    {
        $course = $this->course->findOrFail($id);

        if (!$course) {
            return redirect()->back();
        }

        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        if (!$course = $this->course::find($id)) {
            return redirect()->back()->withInput();
        }
        $input = $request->all();

        $rules = [
            'name' => 'required|max:191'
        ];

        $custom = [
            'name.required' => 'O campo nome é obrigatório',
            'name.max' => 'O campo nome deve conter no máximo 191 caractéres'
        ];

        $validator = Validator::make($request->all(), $rules, $custom);

        if ($validator->fails()) {
            return redirect()
                ->route('courses.create')
                ->withErrors($validator)
                ->withInput();
        }

        if (!empty($request->status)) {
            $input['status'] = 1;
        } else {
            $input['status'] = 0;
        }

        $course->fill($input)->save();

        return redirect(route('courses.index'))->with('status', 'Curso atualizado com sucesso!');
    }

    public function destroy($id)
    {
        //Caso contenha algum aluno vinculado ao curso
        $student = Student::where('course_id', $id)->first();

        if(!empty($student))
        {
            return redirect()
            ->route('courses.index')
            ->withError('Não é possível excluir um curso vinculado a um aluno!');
        }else
        {
            $this->course->find($id)->delete();
        }

        return redirect(route('courses.index'))->with('status', 'Curso excluído com sucesso!');
    }
}
