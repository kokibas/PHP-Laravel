@extends('app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('create_page') }}"> Create New Author</a>
            </div>
            <a class="btn btn-primary" href="{{ route('profile_page') }}">Profile</a>
           
        <td>
            
                @if ($user->is_admin === true )
            <a class="btn btn-primary" href="{{ route('user_page') }}">users</a>                 
                @else
              You are User
                 @endif
             
        
        </td>
             <form action="{{ route('logout') }}" method="GET">
   
                    
                    
                    <button type="submit" class="btn btn-danger">logout</button>
            
                </form>


        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>name</th>
            <th>surname</th>
            <th>born</th>
            <th>active</th>
            
        </tr>
        @foreach ($authors as $author)
        <tr>
            <td>{{ $author->name }}</td>
            <td>{{ $author->surname }}</td>
            <td>{{ $author->born }}</td>
            <td>{{ $author->active ? 'true':'false'}}</td>

          
            <td>
                    <a class="btn btn-primary" href="{{ route('update_page',$author->id) }}">updatePage</a>
                    <a class="btn btn-primary" href="{{ route('book_page',$author->id) }}">Books</a>
                <form action="{{ route('delete',$author->id) }}" method="GET">
   
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection