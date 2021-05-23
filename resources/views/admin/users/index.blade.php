@extends('layouts.main')
@section('admin-style')
<style>
#user_table
{
    border-bottom: none;
}

.dataTables_filter
{
    margin-top: 15px !important;
    margin-right: 20px !important;
}

.dataTables_filter input
{
    border-radius: 15px !important;
    margin-left: 10px !important;
}
.dataTables_filter label
{
    font-weight: 500 !important;
}
</style>
@endsection
@section('content')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="/"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item active"
                        aria-current="page">Usuários</li>
                </ol>
            </nav>
            <h1 class="m-0">Usuários</h1>
        </div>
        <a href="{{ route('admin.users.create') }}"
            class="btn btn-success ml-3">Novo <i class="material-icons">add</i></a>
    </div>
    <div class="card">
        <div class="table-responsive"
             data-toggle="lists"
             data-lists-values='["js-lists-values-employee-name"]'>
             @include('includes.alerts')
            <table class="table mb-0 thead-border-top-0 table-striped" id="user_table">
                <thead>
                    <tr>

                        <th style="width: 30px;"
                            class="text-center">#ID</th>
                        <th>Nome</th>
                        <th style="width: 200px;">E-mail</th>
                        <th style="width: 200px;">Status</th>
                        <th style="width: 50px;">

                      </th>
                    </tr>
                </thead>
                <tbody class="list"
                       id="companies">
                       @forelse ($users as $user)
                    <tr>

                        <td>
                            <div class="badge badge-soft-dark">#{{ $user->id }}</div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">

                                <div class="d-flex align-items-center">
                                    <i class="material-icons icon-16pt mr-1 text-blue">person</i>
                                    {{ $user->name }}
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <small class="text-muted"><i class="material-icons icon-16pt mr-1">link</i>{{ $user->login }} </small>
                            </div>
                        </td>
                        <td style="width: 200px;"><i class="material-icons icon-16pt text-muted-light mr-1">today</i>{{ $user->email }} </td>
                        <td style="width: 200px;"><i class="material-icons icon-16pt text-muted-light mr-1">today</i> {{ $user->status == 1 ? "Habilitado" : "Desabilitado" }} </td>
                        <td><a href="{{ route('admin.users.edit', $user->id) }}"
                               class="btn btn-sm btn-link"><i class="material-icons icon-16pt">arrow_forward</i></a> </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="9">
                            Nenhum usuário cadastrado no momento
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-body text-right">
        {!! $users->links() !!}
        </div>

    </div>
</div>
@endsection
@section('admin-scripts')
<script type="text/javascript">
$(document).ready( function () {
    $('#user_table').DataTable({
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