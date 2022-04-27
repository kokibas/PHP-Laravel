@extends('app')
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Login</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('register_page') }}"> SignUp</a>
            </div>
        </div>
    </div>
           
<form action="{{ route('log') }}" method="POST">
    @csrf
    
     <div class="row">
     

        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Email:</strong>
              <input type="text" name="email" class="form-control" placeholder="name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Password:</strong>
              <input type="password" name="password" class="form-control" placeholder="password">
            </div>
        </div>
       
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">
                    
                Submit</button>
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        </div>
    </div>
</form>
@endsection