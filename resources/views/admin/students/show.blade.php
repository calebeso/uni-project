@extends('layouts.main')

@section('content')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="/"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('students.index') }}">Alunos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detalhes</li>
                </ol>
            </nav>
            <h1 class="m-0">Detalhes do Aluno {{ $student->name }} | RA : {{ $student->id }}</h1>
        </div>
    </div>
</div>

<div class="container-fluid page__container">

    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-4 card-body">
                <p><strong class="headings-color">Informações básicas</strong></p>
            </div>
            <div class="col-lg-8 card-form__body card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="name">Nome</label><br>
                            <input id="name" readonly type="text" class="form-control-flush" value="{{ $student->name }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="email">Email</label><br>
                            <input id="email" readonly type="text" class="form-control-flush" value="{{ $student->email }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="cpf">CPF</label><br>
                            <input id="cpf" readonly type="text" class="form-control-flush" value="{{ $student->cpf }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="phone">Celular</label><br>
                            <input id="phone" readonly type="text" class="form-control-flush" value="{{ $student->phone }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="gender">Gênero</label><br>
                            <input id="gender" readonly type="text" class="form-control-flush" value="{{ $student->gender }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="birth_date">Data de Nascimento</label><br>
                            <input id="birth_date" readonly type="text" class="form-control-flush" value="{{ $student->birth_date }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="status">Status</label><br>
                            <input id="status" readonly type="text" class="form-control-flush" value="{{ $student->status }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @can('is-admin')
    <div class="text-right mb-5">
        <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Deletar Aluno: {{ $student->name }}</button>
    </div>
    @endcan

    @endsection
    <div class="modal modal-danger fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('students.destroy', $student->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" id="id" name="id">
                        <h5 class="text-center">Tem certeza que quer excluir este aluno?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn btn-danger">Sim, excluir aluno</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    @section('main-scripts')
    <script type="text/javascript">
        $(document).on('click', '.delete', function() {
            let id = $(this).attr('data-id');
            $('#id').val(id);
        });
    </script>
    @endsection