<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auther extends Model
{
    use HasFactory;
    
	protected $guarded = [];

    public function book(){
        return $this->belongsToMany(Book::class,'authorbooks','auther_id','book_id');

    }

    public function ebook(){
        return $this->belongsToMany(Ebook::class,'authorbooks','auther_id','ebook_id');

    }

    public function country(){
        return $this->belongsTo(Country::class,'country_id','id');

    }
}

