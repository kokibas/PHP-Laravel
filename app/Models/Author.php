<?php

namespace App\Models;

use App\Http\Controllers\BooksController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Author extends Model
{
    use HasFactory;
    protected $table = 'authors';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'surname',
        'born', 
        'active'
    ];
    public function Books()
    {
        return $this->hasMany(Book::class);
    }
    
}
