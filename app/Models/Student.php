<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Student extends Model
{
    use HasFactory;

	protected $fillable = [
		'name','fname','email','cell_no','gender','reg_no','cnic','batch','department'
	];


    public function bookissues(){
        return $this->hasMany(BookIssue::class,'student_id','id');

    }

    public function getStudent(){
        $records = DB::table('student')->select('id','name','fname','email','cell_no','gender','reg_no','cnic','batch','department')->get()->toArray();

        return $records;
    }

        protected $hidden = [
    	'password', 'remember_token',
    ];
}
