<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookSerial extends Model
{
    use HasFactory;

    protected $guarded = [];

	public function books(){
		return $this->hasMany(Book::class, 'book_id','id');

	}
	public function bookissue(){
        return $this->hasMany(BookIssue::class, 'serial_id','id');

    }
}
