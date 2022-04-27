<?php

namespace App\Models;
use App\Http\Controllers\PublishController;
use App\Http\Controllers\AuthorsController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    public $timestamps = false;
    
    protected $fillable = [
        'author_id',
        'name',
        'description'
    ];
    
    public function Author()
    {
        return $this->belongsTo(Author::class);
    }
    public function Publish(){
        return $this->hasOne(Publish::class);
    }
}
