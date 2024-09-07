<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    

    public function books(){
        return $this->belongsToMany(Book::class,'bookpublishers','book_id','publisher_id');

    }

    public function ebooks(){
        return $this->belongsToMany(Ebook::class,'bookpublishers','ebook_id','publisher_id');

    }
}
