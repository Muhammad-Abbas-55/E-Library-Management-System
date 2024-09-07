<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	use HasFactory;

	protected $guarded = [];

	public function books(){
		return $this->hasMany(Book::class, 'category_id','id');

	}

	public function ebooks(){
		return $this->hasMany(Ebook::class, 'category_id','id');

	}
	
}
