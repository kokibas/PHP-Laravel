<?php

namespace App\Models;
use App\Http\Controllers\BooksController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publish extends Model
{
    use HasFactory;
    protected $table = 'publication';
    public $timestamps = false;
    
    protected $fillable = [
        'name',
        'book_id'
        
    ];
    public function Books(){
        return $this->belongsTo(Book::class);
    }

}
