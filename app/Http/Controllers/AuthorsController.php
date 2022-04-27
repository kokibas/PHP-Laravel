<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreauthorsRequest;
use App\Http\Requests\UpdateauthorsRequest;
use App\Models\Author;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Mockery\Exception\InvalidOrderException;
use \Illuminate\Http\Response;

class AuthorsController extends Controller
{
    public function index()
    {
        $authors = Author:: all();
        $user = Auth::user();
        return view('index', [
            'user' => $user,
            'authors' =>  $authors
        ]);
        
    }
    
    public function create(Request $request)
    {
       $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'born' => 'required',
            'active' => 'required'
        ]);


        Author::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'born' => $request->born,
            'active'=>$request->active?'true':'false'
        ]);

        return redirect()->route('index');
    }
    public function createPage()
    {
        return view('create_page');
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'born' => 'required',
          
        ]);
        Author::where('id', $request->id)->update( [
            'name' => $request->name,
            'surname' => $request->surname,
            'born' => $request->born,
            'active'=>$request->active?'true':'false'
        ]);
        

        return redirect()->route('index');
    }
    public function updatePage($author_id)
    {
        $author = Author::findOrFail($author_id);
        return view('update_page', [
            'author' => $author
        ]);
    }
    

    public function delete(Request $request)
    {
        $author = Author::where('id',$request->id)->delete([
            'name' => $request->name,
            'surname' => $request->surname,
            'born' => $request->born,
            'active'=>$request->active?'true':'false'
        ]);
        
        return redirect()->route('index');
    }   
    
}
