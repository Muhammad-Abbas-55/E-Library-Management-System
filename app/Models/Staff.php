<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Staff extends Model
{
    use HasFactory;
    
	protected $fillable = [
		'name','phone','cnic','email','gender','type'
	];

    public function bookissues(){
        return $this->hasMany(BookIssue::class, 'staff_id','id');

    }

        public function getStaff(){
        $records = DB::table('staff')->select('id','name','phone','cnic','email','gender','type')->get()->toArray();

        return $records;
    }

    protected $hidden = [
    	'password', 'remember_token',
    ];
}
