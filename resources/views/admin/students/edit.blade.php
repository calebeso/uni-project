@extends('layouts.main')
@section('content')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="/"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('students.index') }}">Alunos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Novo</li>
                </ol>
            </nav>
            <h1 class="m-0">Editar Aluno {{ $student->name }}</h1>
        </div>
    </div>
</div>

<div class="container-fluid page__container">
    <form action="{{ route('students.update', $student->id) }}" method="post">
        <input type="hidden" name="_method" value="PUT">
        @include('includes.alerts')
        @csrf

        <div class="card card-form">
            <div class="row no-gutters">
                <div class="col-lg-4 card-body">
                    <p><strong class="headings-color">Informações básicas</strong></p>
                </div>
                <div class="col-lg-8 card-form__body card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input id="name" name="name" type="text" class="form-control" placeholder="Nome:" value="{{ $student->name ?? old('name') }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" name="email" type="text" class="form-control" placeholder="Nome:" value="{{ $student->email ?? old('email') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="cpf">CPF</label>
                                <input id="cpf" name="cpf" type="text" class="form-control" placeholder="CPF:" value="{{ $student->cpf ?? old('cpf') }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="phone">Celular</label>
                                <input id="phone" name="phone" type="text" class="form-control" placeholder="Celular:" value="{{ $student->phone ?? old('phone') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="gender">Gênero</label>
                                <select class="form-control" name="gender" id="gender">
                                    <option>Escolha um gênero</option>
                                    <option value="masculino" {{ $student->gender == 'masculino' ? 'selected' : '' }}> Masculino </option>
                                    <option value="feminino" {{ $student->gender == 'feminino' ? 'selected' : '' }}> Feminino </option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="birth_date">Data de Nascimento</label>
                                <input id="birth_date" name="birth_date" type="date" class="form-control" placeholder="Nome:" value="{{ $student->birth_date ?? old('birth_date') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="course">Cursos</label>
                                <select class="form-control" name="course_id" id="course">
                                    <option>Escolha um curso</option>
                                    @foreach($courses as $course)
                                    <option value="{{ $course->id }}" {{ $student->course_id == $course->id ? 'selected' : '' }}> {{ $course->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option>Selecione um status</option>
                                    <option value="Ativo" {{ $student->status == 'Ativo' ? 'selected' : '' }}> Ativo </option>
                                    <option value="Aguardando" {{ $student->status == 'Aguardando' ? 'selected' : '' }}> Aguardando </option>
                                    <option value="Trancado" {{ $student->status == 'Trancado' ? 'selected' : '' }}> Trancado </option>
                                    <option value="Desistente" {{ $student->status == 'Desistente' ? 'selected' : '' }}> Desistente </option>
                                    <option value="Transferido" {{ $student->status == 'Transferido' ? 'selected' : '' }}> Transferido </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-right mb-5 mr-5">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </div>
    </form>
</div>
@endsection