@extends('layouts.main')
@section('content')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="/"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Alunos</li>
                </ol>
            </nav>
            <h1 class="m-0">Alunos</h1>
        </div>
        @can('is-admin')
        <a href="{{ route('students.create') }}" class="btn btn-success ml-3">Novo <i class="material-icons">add</i>
        </a>
        @endcan
    </div>
    <div class="page__heading d-flex align-items-center">
        <span>Status : </span>
        <span class="badge badge-success students-subtitles">Ativo</span>
        <span class="badge badge-primary students-subtitles">Aguardando</span>
        <span class="badge badge-secondary students-subtitles">Trancado</span>
        <span class="badge badge-danger students-subtitles">Desistente</span>
        <span class="badge badge-warning students-subtitles">Transferido</span>
    </div>
    <div class="card">
        <div class="table-responsive" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>
            @include('includes.alerts')
            <table class="table mb-0 thead-border-top-0 table-striped" id="student_table">
                <thead>
                    <tr>

                        <th style="width: 30px;" class="text-center">RA</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th style="width: 200px;">Celular</th>
                        <th>Status</th>
                        <th>Curso</th>
                        @can('is-admin')
                        <th style="width: 50px;"></th>
                        @endcan
                    </tr>
                </thead>
                <tbody class="list" id="companies">
                    @forelse ($students as $student)
                    <tr>

                        <td>
                            <div class="badge badge-soft-dark">#{{ $student->id }}</div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">

                                <div class="d-flex align-items-center">
                                    <i class="material-icons icon-16pt mr-1 text-blue">list</i>
                                    <a href="{{ route('students.show', $student->id) }}">{{ $student->name }}</a>
                                </div>
                            </div>
                        </td>
                        <td> {{ $student->email }} </td>
                        <td  style="width: 200px;"> {{ $student->phone }} </td>
                        <td>{{ $student->status }} </td>
                        <td>{{ $student->course->name }}</td>
                        @can('is-admin')
                        <td><a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-link"><i class="material-icons icon-16pt">arrow_forward</i></a> </td>
                        @endcan
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="9">
                            Nenhum curso cadastrado no momento
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-body text-right">
            {!! $students->links() !!}
        </div>

    </div>
</div>
@endsection
@section('main-scripts')
<script>
    $(document).ready(function() {
        $('#student_table').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                text: 'Exportar para Excel',
                extend: 'excel'
            }],
            "responsive": true,
            "paginate": false,
            "bInfo": false,
            "ordering": false,
            "language": {
                "search": "Consultar registro",
                "searchPlaceholder": "Ra, Nome, Status, Curso"
            }
        });
    });
</script>
@endsection