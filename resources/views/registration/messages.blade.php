@if(Session::has('errors'))
    <div class="alert danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(Session::has('success'))
    <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
    </div>
@endif
@if(session('error'))
    <div class="alert danger">
        {{ session('error') }}
    </div>
@endif
