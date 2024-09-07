<?php

namespace App\Models;
use Excel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Frontend extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');

    }

    public function publishers(){
        return $this->belongsToMany(Publisher::class,'bookpublishers','book_id','publisher_id');

    }

    public function bookissue(){
        return $this->hasMany(BookIssue::class,'book_id','id');

    }

    public function authers(){
        return $this->belongsToMany(Auther::class,'authorbooks','auther_id','book_id');

    }

     public function shelves(){
        return $this->belongsToMany(Shelf::class,'shelfbooks','shelf_id','book_id');

     }

    public function country(){
        return $this->belongsTo(Country::class,'country_id','id');

    }

        public function getBook(){
        $records = DB::table('book')->select('id','b_title','b_price','e_book','b_edition','b_isbn','p_date','total_copies','avalible_copies')->get()->toArray();

        return $records;
    }
   
}
