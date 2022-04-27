@extends('app')
@section('content')
<div class="row">
      
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('index') }}"> Back</a>
            </div>
           
        </div>
        <div class="pull-right">
                <a class="btn btn-success" href="{{ route('create_user') }}"> Create New User</a>
            </div>
       
        
</div>

        
            
    </div>

        
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <table class="table table-bordered">
        <tr>
            <th>Users</th>
            
            
        </tr>
       
   
        <tr>
            <th>name</th>
            <th>email</th>
          
        @if($errors->any())
            {{ implode('', $errors->all(':message')) }}
        @endif
        </tr>
        @foreach ($users as $user)
        
        <tr>    
            <td>{{ $user->name}}</td>
            <td>{{ $user->email}}</td>

           <td> <a class="btn btn-success" href="{{ route('edit_user',$user->id) }}"> edit</a></td>
           <td> <a class="btn btn-success" href="{{ route('change_password',$user->id) }}"> changePassword</a></td>
        <td>  
      
<form action="{{ route('delete_user',$user->id) }}" method="GET">
   
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Delete</button>

          
            
</form>
        </td>
        </tr>
        @endforeach
    </table>

@endsection