@extends('app')
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Books</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('index') }}"> Back</a>
            </div>
           
        </div>
        <div class="col-lg-12 margin-tb">
        <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('create_book',$author->id) }}"> Create New Book</a>
               
            </div>
        </div>
        
</div>

        
            
    </div>

        
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <table class="table table-bordered">
        <tr>
            <th>Books</th>
            
            
        </tr>
        @foreach ($author->Books as $book)
        <tr>
            <td>{{ $book->author_id}}</td>
            <td>{{ $book->name}}</td>
            <td>{{ $book->description}}</td>
            <td>
                @if ($book->Publish === null )
                    Not have date                   
                @else
                 {{$book->Publish->name }}</td>
                 @endif
                 
            <td>
                <a class="btn btn-primary" href="{{ route('update_book',$book->id) }}">updateBook</a>
                @if ($book->Publish === null )
                <a class="btn btn-primary" href="{{ route('create_publish',$book->id) }}">create publish</a>
                @else
                <a class="btn btn-primary" href="{{ route('update_publish',$book->Publish->id) }}">updatePublish</a>
                <form action="{{ route('delete_publish',$book->Publish->id) }}" method="GET">
   
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">DeletePublish</button>
                </form>
                 @endif
                
               <form action="{{ route('delete_bookname',$book->id) }}" method="GET">
   
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                
            </td>
             
          
                    
        </tr>
            </div>
            </div>
         </div>
@endforeach