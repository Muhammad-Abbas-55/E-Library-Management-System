<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookIssue extends Model
{
    use HasFactory;

    protected $guarded = [];


     public function book(){
        return $this->belongsTo(Book::class,'book_id','id');

    }

    public function bookreturn(){
        return $this->hasMany(BookReturn::class,'issue_id','id');

    }

    public function student(){
        return $this->belongsTo(Student::class,'student_id','id');

    }

    public function staff(){
        return $this->belongsTo(Staff::class, 'staff_id','id');

    }
    public function serials(){
        return $this->belongsTo(BookSerial::class, 'serial_id','id');

    }
}
