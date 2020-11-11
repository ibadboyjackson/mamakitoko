@if(Session::has('errors'))
    <div class="container">
        <div class="alert alert-danger my-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
@if(Session::has('success'))
    <div class="container">
        <div class="alert alert-success my-4">
            <p>{{ Session::get('success') }}</p>
        </div>
    </div>
@endif

