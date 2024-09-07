<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $guarded = [];

	public function books(){
		return $this->hasMany(Book::class, 'country_id','id');

	}

	public function ebooks(){
		return $this->hasMany(Ebook::class, 'country_id','id');

	}

	public function authers(){
		return $this->hasMany(Auther::class, 'country_id','id');

	}
}
