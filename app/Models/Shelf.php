<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
    use HasFactory;

	protected $guarded = [];

    public function book(){
        return $this->belongsToMany(Book::class, 'shelfbooks','book_id','shelf_id');

    }

}
