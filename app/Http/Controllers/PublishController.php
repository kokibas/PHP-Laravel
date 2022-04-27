<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Publish;
use Illuminate\Http\Request;

class PublishController extends Controller
{
    public function publishPage($id){
        $book = Book::with('Publish')->find($id);
 
     return view( 'name',[
         'book' =>  $book
     ]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'book_id'=>'required'
            
           
            
          
        ]);
       
      
        Publish::where('id', $request->id)->update( [
            'name' => $request->name,
            'book_id' => $request->book_id,
            
            
  
        ]);
        

        return redirect()->route('book_page',$request->book_id);
    }
    public function updatePage($book_id)
    {
        
        $book = Publish::findOrFail($book_id);
        return view('update_publish', [    
            'book' => $book
        ]);
    }
    public function delete(Request $request)
   {
       $book = Publish::where('id',$request->id)->delete();
       
       return redirect()->back();
   }
   public function create(Request $request)
   {
      $request->validate([
           'book_id' => 'required',
           'name' => 'required'
           
          
       ]);


       Publish::create([
           'book_id' => $request->book_id,
           'name' => $request->name           
           
           
       ]);

       return redirect()->route('book_page',$request->book_id);
   }
   public function createPage($book_id)
   {
       
       return view('create_publishpage',[
           'book_id'=>$book_id
       ]);
   } 
}

