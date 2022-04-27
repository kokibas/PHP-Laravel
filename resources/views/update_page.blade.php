@extends('app')
@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>updatePage</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('index') }}"> Back</a>
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

    <form action="{{ route('update') }}" method="POST">
        @csrf
        <input type="hidden"  value={{ $author->id }} name="id">
        
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>name</strong>
                    <input type="text" name="name" 
                    value="{{ $author->name }}" class="form-control" placeholder="name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>surname</strong>
                    <input type="text" name="surname" 
                    value="{{ $author->surname }}" class="form-control" placeholder="surname">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>born</strong>
                    <input type="date" name="born" 
                    value="{{ $author->born }}" class="form-control" placeholder="date">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>active</strong>
                    <input type="checkbox" name="active"  value={{$author->active?'true':'false'}} >
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection