<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\BookIssue;
use App\Models\BookReturn;
use App\Models\Ebook;
use App\Models\Fine;
use App\Models\Publisher;
use App\Models\Country;
use App\Models\Auther;
use App\Models\Student;
use App\Models\Staff;
use App\Models\AboutUs;
use App\Models\ContactUs;
use App\Models\Feedback;
use DB;
class AdminHomeController extends Controller
{
    public function dashboard(){

    	$books =Book::all();
        $category =Category::all();
        $bookissue =BookIssue::all();
        $bookreturn =BookReturn::all();
        $ebook =Ebook::all();
        $fine =Fine::all();
        $publisher =Publisher::all();
        $country =Country::all();
        $author =Auther::all();
        $student =Student::all();
        $staff =Staff::all();
        $about =AboutUs::all();
        $contact =ContactUs::all();
        $feedback =Feedback::all();

        return view("admin.views.dashboard",compact('books','category','bookissue','bookreturn','ebook','fine','country','publisher','author','student','staff','about','contact','feedback'));
    }

}
