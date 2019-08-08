@if($errors->any())
    <div class="alert alert-danger">
        <strong><i class="icon-warning2"></i> Error :</strong>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(@session('error'))
    <div class="alert alert-danger">
        <strong><i class="icon-warning2"></i></strong> {{ session('error') }}
    </div>
@endif
@if(@session('info'))
    <div class="alert alert-info">
        <strong><i class="icon-info3"></i></strong> {{ session('info') }}
    </div>
@endif
