@extends('app')
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Profile</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('index') }}"> Back</a>
            </div>
           
        </div>
       

        
            
    </div>

    

        
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <table class="table table-bordered">
        <tr>
            <th>Profile</th>
            
            
        </tr>
        
        <tr>
            <td>{{ $user->name}}</td>
            <td>{{ $user->email }}</td>
         
           
            <td>
                
            <a class="btn btn-primary" href="{{ route('edit_profile',$user->id) }}">edit</a>
            <a class="btn btn-primary" href="{{ route('edit_password',$user->id) }}">editPassword</a>
                
            </td>
                
            </td>
             
          
                    
        </tr>
            </div>
            </div>
         </div>
