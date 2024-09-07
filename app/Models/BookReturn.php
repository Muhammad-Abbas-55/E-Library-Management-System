<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookReturn extends Model
{
    use HasFactory;

	protected $guarded = [];

    public function bookissue(){
        return $this->belongsTo(BookIssue::class,'issue_id','id');
    }

    
    public function fine(){
        return $this->belongsTo(Fine::class,'fine_id','id');
    }
}
