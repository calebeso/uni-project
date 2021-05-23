<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate as FacadesGate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function index()
    {
        $users = $this->user->latest('id')->paginate();

        if(FacadesGate::allows('is-admin'))
        {
            return view('admin.users.index', compact('users'));
        }else
        {
            return redirect()->back();
        }
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $data = new User();
        $input = $request->all();

        $rules = [
            'name' => 'required|max:191',
            'email' => 'required|email|unique:users|max:191',
            'login' => 'required|unique:users|max:20',
            'password' => 'required'
        ];

        $custom = [
            'name.required' => 'O campo nome é obrigatório',
            'name.max' => 'O campo nome deve conter no máximo 191 caractéres',
            'email.required' => 'O campo e-mail é obrigatório',
            'email.email' => 'O campo e-mail deve ser um e-mail válido',
            'email.unique' => 'Este e-mail já existe',
            'email.max' => 'O campo e-mail deve conter no máximo 191 caractéres',
            'login.required' => 'O campo login é obrigatório',
            'login.unique' => 'Este login já existe',
            'login.max' => 'O campo login deve conter no máximo 20 caractéres',
            'password.required' => 'O campo senha é obrigatório',
        ];

        $validator = Validator::make($request->all(), $rules, $custom);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.users.create')
                ->withErrors($validator)
                ->withInput();
        }

        if (!empty($request->status)) {
            $input['status'] = 1;
        } else {
            $input['status'] = 0;
        }

        $data->fill($input)->save();

        $data->roles()->sync($request->roles);

        return redirect(route('admin.users.index'))->with('status', 'Usuário criado com sucesso!');
    }


    public function edit($id)
    {
        $user = $this->user->findOrFail($id);

        $roles = Role::all();

        if (!$user) {
            return redirect()->back();
        }

        return view('.admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        if (!$user = $this->user::find($id)) {
            return redirect()->back()->withInput();
        }

        $input = $request->all();

        $rules = [
            'name' => 'required|max:191',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id), 'max:191'],
            'login' => ['required', Rule::unique('users')->ignore($user->id), 'max:20'],
            'password' => 'required'
        ];

        $custom = [
            'name.required' => 'O campo nome é obrigatório',
            'name.max' => 'O campo nome deve conter no máximo 191 caractéres',
            'email.required' => 'O campo e-mail é obrigatório',
            'email.email' => 'O campo e-mail deve ser um e-mail válido',
            'email.unique' => 'Este e-mail já existe',
            'email.max' => 'O campo e-mail deve conter no máximo 191 caractéres',
            'login.required' => 'O campo login é obrigatório',
            'login.unique' => 'Este login já existe',
            'login.max' => 'O campo login deve conter no máximo 20 caractéres',
            'password.required' => 'O campo senha é obrigatório',
        ];

        $validator = Validator::make($request->all(), $rules, $custom);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.users.edit', $user->id)
                ->withErrors($validator)
                ->withInput();
        }

        if (!empty($request->status)) {
            $input['status'] = 1;
        } else {
            $input['status'] = 0;
        }

        $user->fill($input)->save();

        $user->roles()->sync($request->roles);

        return redirect(route('admin.users.index'))->with('status', 'Usuário atualizado com sucesso!');
    }
}
