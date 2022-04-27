<?php

namespace App\Http\Controllers;


use App\Models\Book;
use App\Models\Author;
use Database\Factories\BooksFactory;
use Illuminate\Http\Request;


class BooksController extends Controller
{
   public function books($id){
       $author = Author::with('Books.Publish')->find($id);
       
    return view('books', [
        'author' =>  $author
    ]);
   }
   
   public function delete(Request $request)
   {
       $author = Book::where('id',$request->id)->delete();
       
       return redirect()->back();
   }
   public function create(Request $request)
   {
      $request->validate([
           'author_id' => 'required',
           'name' => 'required',
           'description' => 'required',
          
       ]);


       Book::create([
           'author_id' => $request->author_id,
           'name' => $request->name,           
           'description' => $request->description,
           
       ]);

       return redirect()->route('book_page',$request->author_id);
   }
   public function createPage($author_id)
   {
       
       return view('create_bookpage',[
           'author_id'=>$author_id
       ]);
   } 
   public function update(Request $request)
    {
        $request->validate([
            'author_id'=>'required',
            'name' => 'required',
            'description' => 'required',
            
          
        ]);
       
       // dd($request->all());
        Book::where('id', $request->id)->update( [
            'author_id' => $request->author_id,
            'name' => $request->name,
            'description' => $request->description,
  
        ]);
        

        return redirect()->route('book_page',$request->author_id);
    }
    public function updatePage($author_id)
    {
        $author = Book::findOrFail($author_id);
        return view('update_book', [    
            'author' => $author
        ]);
    }
    
}
