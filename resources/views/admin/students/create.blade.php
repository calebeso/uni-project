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
            <h1 class="m-0">Cadastrar Novo Aluno</h1>
        </div>
    </div>
</div>

<div class="container-fluid page__container">
    <form action="{{ route('students.store') }}" method="post">
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
                                <input id="name" name="name" type="text" class="form-control" placeholder="Nome:" value="{{ $user->name ?? old('name') }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" name="email" type="text" class="form-control" placeholder="Nome:" value="{{ $user->email ?? old('email') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="cpf">CPF</label>
                                <input id="cpf" name="cpf" type="text" class="form-control cpf" placeholder="000.000.000-00" value="{{ $user->cpf ?? old('cpf') }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="phone">Celular</label>
                                <input id="phone" name="phone" type="text" class="form-control phone" placeholder="(00) 0 0000-0000" value="{{ $user->phone ?? old('phone') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="gender">Gênero</label>
                                <select class="form-control" name="gender" id="gender">
                                    <option>Escolha um gênero</option>
                                    <option value="masculino"> Masculino </option>
                                    <option value="feminino"> Feminino </option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="birth_date">Data de Nascimento</label>
                                <input id="birth_date" name="birth_date" type="text" class="form-control date" placeholder="00/00/0000" value="{{ $user->birth_date ?? old('birth_date') }}">
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
                                    <option value="{{ $course->id }}"> {{ $course->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                        <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option>Selecione um status</option>
                                    <option value="Ativo"> Ativo </option>
                                    <option value="Aguardando"> Aguardando </option>
                                    <option value="Trancado"> Trancado </option>
                                    <option value="Desistente"> Desistente </option>
                                    <option value="Transferido"> Transferido </option>
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
@section('main-scripts')
<script type="text/javascript">
$(document).ready(function($){
  $('.date').mask('00/00/0000');
  $('.phone').mask('(00) 0 0000-0000');
  $('.cpf').mask('000.000.000-00', {reverse: true});
});
</script>
@endsection