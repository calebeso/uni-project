@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div><br>
@endif

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@elseif (session('unsuccess'))
<div class="alert alert-danger" role="alert">
    {{ session('unsuccess') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div><br>
@endif

@section('admin-scripts')
<script type="text/javascript">
    $(".alert-success, .alert-danger").fadeTo(4000, 500).slideUp(500, function() {
        $(".alert-success, .alert-danger").slideUp(500);
    });
</script>
@endsection