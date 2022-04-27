@extends('app')
@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>change</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('user_page') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('change') }}" method="POST">
        @csrf
        
        <input type="hidden" value="{{$user->id}}" name="id">
        <div class="form-group">
            <label for="password">New Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="password">Confirm Password:</label>
            <input type="password" class="form-control" id="password" name="password_confirmation">
        </div>
       
          
            
            


           

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection