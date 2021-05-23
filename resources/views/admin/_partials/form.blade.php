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
                        <label for="login">Login</label>
                        <input id="login" name="login" type="text" class="form-control" placeholder="Login:" value="{{ $user->login ?? old('login') }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input id="email" name="email" type="text" class="form-control" placeholder="E-mail:" value="{{ $user->email ?? old('email') }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input id="password" name="password" type="password" class="form-control" placeholder="Senha:">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="status">Status</label><br>
                        <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                            <input checked type="checkbox" id="status" name="status" class="custom-control-input">
                            <label class="custom-control-label" for="status">Sim</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card card-form">
    <div class="row no-gutters">
        <div class="col-lg-4 card-body">
            <p><strong class="headings-color">Permissões</strong></p>
            <p class="text-muted">Admin: acesso total ao sistema </p><br>
            <p class="text-muted"> Basico : consultar e visualizar alunos e cursos</p>
        </div>
        <div class="col-lg-8 card-form__body card-body">
            <div class="row">
                @foreach($roles as $role)
                <div class="col">
                    <div class="form-group">
                        <label for="{{ $role->name }}">{{ $role->name }}</label><br>
                        <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                            <input type="checkbox" id="{{ $role->name }}" name="roles[]" class="custom-control-input" value="{{ $role->id }}"
                            @isset($user) @if(in_array($role->id, $user->roles->pluck('id')->toArray())) checked @endif @endisset >
                            <label class="custom-control-label" for="{{ $role->name }}"></label>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="text-right mb-5">
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</div>
    @section('main-scripts')
    <script type="text/javascript">
        $(".alert-success, .alert-danger").fadeTo(4000, 500).slideUp(500, function() {
            $(".alert-success, .alert-danger").slideUp(500);
        });
    </script>
    @endsection