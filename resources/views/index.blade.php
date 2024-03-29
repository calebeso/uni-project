@extends('layouts.main')
@section('content')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="/"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Início</li>
                </ol>
            </nav>
            <h1 class="m-0">Início</h1>
        </div>
    </div>
</div>

<div class="container-fluid page__container">
    <div class="row card-group-row">
        @can('is-admin')
        <div class="col-lg-3 col-md-4 card-group-row__col">
            <div class="card card-group-row__card">
                <div class="p-2 d-flex flex-row align-items-center">
                    <div class="avatar avatar-xs mr-2">
                        <span class="avatar-title rounded-circle text-center bg-primary">
                            <i class="material-icons text-white icon-18pt">people</i>
                        </span>
                    </div>
                    <a href="{{ route('admin.users.index') }}" class="text-dark">
                        <strong>Usuários</strong>
                    </a>
                </div>
            </div>
        </div>
        @endcan
        <div class="col-lg-3 col-md-4 card-group-row__col">
            <div class="card card-group-row__card">
                <div class="p-2 d-flex flex-row align-items-center">
                    <div class="avatar avatar-xs mr-2">
                        <span class="avatar-title rounded-circle text-center bg-primary">
                            <i class="material-icons text-white icon-18pt">description</i>
                        </span>
                    </div>
                    <a href="{{ route('courses.index') }}" class="text-dark">
                        <strong>Cursos</strong>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 card-group-row__col">
            <div class="card card-group-row__card">
                <div class="p-2 d-flex flex-row align-items-center">
                    <div class="avatar avatar-xs mr-2">
                        <span class="avatar-title rounded-circle text-center bg-primary">
                            <i class="material-icons text-white icon-18pt">school</i>
                        </span>
                    </div>
                    <a href="{{ route('students.index') }}" class="text-dark">
                        <strong>Alunos</strong>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection