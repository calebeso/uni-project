@extends('layouts.main')
@section('content')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="/"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('courses.index') }}">Cursos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Novo</li>
                </ol>
            </nav>
            <h1 class="m-0">Editar Curso {{ $course->name }}</h1>
        </div>
    </div>
</div>

<div class="container-fluid page__container">
    <form action="{{ route('courses.update', $course->id) }}" method="post">
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
                                <input id="name" name="name" type="text" class="form-control" placeholder="Nome:" value="{{ $course->name ?? old('name') }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="status">Status</label><br>
                                <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                    <input type="checkbox" id="status" name="status" class="custom-control-input"  {{$course->status==1?"checked":""}}>
                                    <label class="custom-control-label" for="status">Sim</label>
                                </div>
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
