<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    public function index()
    {
        $students = $this->student->latest('id')->paginate();
        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        $courses = Course::where('status', 1)->get();
        return view('admin.students.create', compact('courses'));
    }

    public function show($id)
    {
        $student = $this->student->findOrFail($id);

        if (!$student) {
            return redirect()->back();
        }

        return view('admin.students.show', compact('student'));
    }

    public function edit($id)
    {
        $student = $this->student->findOrFail($id);

        $courses = Course::where('status', 1)->get();

        if (!$student) {
            return redirect()->back();
        }

        return view('admin.students.edit', compact('student', 'courses'));
    }

    public function store(Request $request)
    {
        $data = new Student();
        $input = $request->all();

        $rules = [
            'name' => 'required|max:191',
            'email' => 'required|email|unique:students|max:191',
            'cpf' => 'required|cpf|unique:students|max:14',
            'phone' => 'max:16',
            'birth_date' => 'required|date_format:d/m/Y',
        ];


        $custom = [
            'name.required' => 'O campo nome é obrigatório',
            'name.max' => 'O campo nome deve conter no máximo 191 caractéres',
            'email.required' => 'O campo email é obrigatório',
            'email.max' => 'O campo email deve conter no máximo 191 caractéres',
            'email.email' => 'O campo e-mail deve ser um e-mail válido',
            'email.unique' => 'Este e-mail já existe',
            'cpf.required' => 'O campo CPF é obrigatório',
            'cpf.unique' => 'Este CPF já existe',
            'cpf.cpf' => 'Este CPF não é válido',
            'cpf.max' => 'O campo CPF deve conter no máximo 11 caractéres',
            'phone.max' => 'O campo telefone deve conter no máximo 14 caractéres',
            'birth_date.required' => 'O campo data de nascimento é obrigatório',
        ];

        $validator = Validator::make($request->all(), $rules, $custom);

        if ($validator->fails()) {
            return redirect()
                ->route('students.create')
                ->withErrors($validator)
                ->withInput();
        }

        $data->fill($input)->save();

        $data->course()->associate($request->course_id);
        
        return redirect(route('students.index'))->with('status', 'Aluno criado com sucesso!');
    }

    public function update(Request $request, $id)
    {
        if (!$student = $this->student::find($id)) {
            return redirect()->back()->withInput();
        }
        $input = $request->all();

        $rules = [
            'name' => 'required|max:191',
            'email' => ['required', 'email', 'email', Rule::unique('students')->ignore($student->id), 'max:191'],
            'cpf' => ['required','cpf', Rule::unique('students')->ignore($student->id), 'max:14'],
            'phone' => 'max:16',
            'birth_date' => 'required|date_format:d/m/Y',
        ];


        $custom = [
            'name.required' => 'O campo nome é obrigatório',
            'name.max' => 'O campo nome deve conter no máximo 191 caractéres',
            'email.required' => 'O campo email é obrigatório',
            'email.max' => 'O campo email deve conter no máximo 191 caractéres',
            'email.email' => 'O campo e-mail deve ser um e-mail válido',
            'email.unique' => 'Este e-mail já existe',
            'cpf.cpf' => 'Este CPF não é válido',
            'cpf.required' => 'O campo CPF é obrigatório',
            'cpf.unique' => 'Este CPF já existe',
            'cpf.max' => 'O campo CPF deve conter no máximo 11 caractéres',
            'phone.max' => 'O campo telefone deve conter no máximo 14 caractéres',
            'birth_date.required' => 'O campo data de nascimento é obrigatório',
        ];

        $validator = Validator::make($request->all(), $rules, $custom);

        if ($validator->fails()) {
            return redirect()
                ->route('students.edit', $student->id)
                ->withErrors($validator)
                ->withInput();
        }

        $student->fill($input)->save();

        $student->course()->associate($request->course_id);

        return redirect(route('students.index'))->with('status', 'Aluno atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $this->student->find($id)->delete();

        return redirect(route('students.index'))->with('status', 'Aluno excluído com sucesso!');
    }
}
