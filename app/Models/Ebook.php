<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');

    }

    public function publishers(){
        return $this->belongsToMany(Publisher::class,'bookpublishers','ebook_id','publisher_id');

    }

    public function country(){
        return $this->belongsTo(Country::class,'country_id','id');

    }

    public function authers(){
        return $this->belongsToMany(Auther::class,'authorbooks','ebook_id','auther_id');

    }
}
