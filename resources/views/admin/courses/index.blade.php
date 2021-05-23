@extends('layouts.main')
@section('content')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="/"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item active"
                        aria-current="page">Cursos</li>
                </ol>
            </nav>
            <h1 class="m-0">Cursos</h1>
        </div>
        @can('is-admin')
        <a href="{{ route('courses.create') }}"
            class="btn btn-success ml-3">Novo <i class="material-icons">add</i></a>
        @endcan
    </div>
    <div class="card">
        <div class="table-responsive"
             data-toggle="lists"
             data-lists-values='["js-lists-values-employee-name"]'>
             @include('includes.alerts')
            <table class="table mb-0 thead-border-top-0 table-striped" id="course_table">
                <thead>
                    <tr>

                        <th style="width: 30px;"
                            class="text-center">#ID</th>
                        <th>Nome</th>
                        <th style="width: 200px;">Status</th>
                        @can('is-admin')                        
                        <th style="width: 50px;"></th>
                        @endcan
                    </tr>
                </thead>
                <tbody class="list"
                       id="companies">
                       @forelse ($courses as $course)
                    <tr>

                        <td>
                            <div class="badge badge-soft-dark">#{{ $course->id }}</div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">

                                <div class="d-flex align-items-center">
                                    <i class="material-icons icon-16pt mr-1 text-blue">list</i>
                                    <a href="{{ route('courses.show', $course->id) }}">{{ $course->name }}</a>
                                </div>
                            </div>
                        </td>
                        <td style="width: 200px;"><i class="material-icons icon-16pt text-muted-light mr-1">today</i> {{ $course->status == 1 ? "Habilitado" : "Desabilitado" }} </td>
                        @can('is-admin')
                        <td><a href="{{ route('courses.edit', $course->id) }}"
                               class="btn btn-sm btn-link"><i class="material-icons icon-16pt">arrow_forward</i></a> </td>
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
        {!! $courses->links() !!}
        </div>

    </div>
</div>
@endsection
@section('main-scripts')
<script type="text/javascript">
$(document).ready( function () {
    $('#course_table').DataTable({
        "responsive" : true,
        "paginate" : false,
        "bInfo" : false,
        "ordering" : false, 
        "language" : {
        "search" : "Consultar registro",
        "searchPlaceholder" : " Nome, Status"
        }
    });
} );
</script>
@endsection