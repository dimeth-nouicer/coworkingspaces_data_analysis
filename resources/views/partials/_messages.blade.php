@if(Session::has('success'))
    <div class="alert alert-success" role="alert"> 
    <strong> Success: </strong> {{ session::get('success') }}
    </div>
@endif

@if(count($errors)>0)
    <strong> Errors: </strong> 
    <ul>
    @foreach($errors as $error)
    <li> {{$error}} </li>
    @endforeach
    </ul>
@endif