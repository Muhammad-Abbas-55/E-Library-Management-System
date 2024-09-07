<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\ContactUs;
use App\Models\Book;
use App\Models\Ebook;
use App\Models\Category;
use App\Models\Auther;
use App\Models\Shelf;
use App\Models\Authorbook;
use App\Models\Shelfbook;
use App\Models\Publisher;
use App\Models\News;
use DB;

// use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
      public function std()
    {
        //$about = AboutUs::find(1);
        $about = AboutUs::first();
        $contact=ContactUs::first();
        $category = Category::all();
        $book =Book::all();
        $auther =Auther::all();
        $bk =Book::latest()->take(2)->get();

        $ebook =Ebook::all();
         // dd($ebook); 
        $pdfbook =Ebook::where('pdfbook','LIKE','%'.'pdf'.'%')->get();
        $pdf = Ebook::where('pdfbook','LIKE','%'.'pdf'.'%')->latest()->take(2)->get();

        $audiobook =Ebook::where('audiobook','LIKE','%'.'mp3'.'%')->get();
        $aud =Ebook::where('audiobook','LIKE','%'.'mp3'.'%')->latest()->take(2)->get();

        $papers =Ebook::where('papers','LIKE','%'.'pdf'.'%')->get();
        $pap =Ebook::where('papers','LIKE','%'.'pdf'.'%')->latest()->take(2)->get();

        $magazine =Ebook::where('magazine','LIKE','%'.'pdf'.'%')->get();
        $mag =Ebook::where('magazine','LIKE','%'.'pdf'.'%')->latest()->take(2)->get();
        
        $videobook =Ebook::where('videobook','LIKE','%'.'mp4'.'%')->get();
        $vid =Ebook::where('videobook','LIKE','%'.'mp4'.'%')->latest()->take(2)->get();

        $news =News::first();


		//dd($about);

        return view('std.views.dashboard', compact('auther','about','contact','category','book','ebook','pdfbook','audiobook','magazine','papers','videobook','pdf','aud','mag','pap','vid','bk','news'));
	}

        public function logindash()
    {
        $about = AboutUs::first();

        return view('login_dashboard', compact('about'));
    }


	 public function bookindex()
    {
        $books = Book::latest()->paginate(10);
        $boks = Book::all();
		$bok = Book::latest()->take(6)->get();
        $category = Category::all();
        $publisher = Publisher::all();
        $author = Auther::all();
        $contact = ContactUs::first();
        $about = AboutUs::first();


      
        return view('std.views.books.book_index', compact('books','boks','bok','category','contact','about','author'));

	}

     public function ebookindex()
    {
        $ebooks = Ebook::all();
        $category = Category::all();
        $publisher = Publisher::all();
        $author = Auther::all();
        $about = AboutUs::first();
        $contact = ContactUs::first();
        $pdf = Ebook::where('pdfbook','LIKE','%'.'pdf'.'%')->latest()->take(6)->get();


      
        return view('std.views.books.ebook_index', compact('category','ebooks','author','publisher','contact','about','pdf'));

    }
        public function audiobookindex()
    {
        $ebooks = Ebook::latest()->paginate(50);
        $category = Category::all();
        $publisher = Publisher::all();
        $author = Auther::all();
        $contact=ContactUs::first();
        $about = AboutUs::first();
        $aud =Ebook::where('audiobook','LIKE','%'.'mp3'.'%')->latest()->take(6)->get();


      
        return view('std.views.books.audiobook_index', compact('category','ebooks','author','publisher','contact','about','aud'));

    }

        public function magazineindex()
    {
        $ebooks = Ebook::latest()->paginate(50);
        $contact=ContactUs::first();
        $mag =Ebook::where('magazine','LIKE','%'.'pdf'.'%')->latest()->take(6)->get();


        $category = Category::all();
        $publisher = Publisher::all();
        $author = Auther::all();
        $about = AboutUs::first();
      
        return view('std.views.books.magazine_index', compact('mag','category','ebooks','author','publisher','contact','about'));

    }


        public function papersindex()
    {
        $ebooks = Ebook::latest()->paginate(50);
        $contact=ContactUs::first();
        $pap =Ebook::where('papers','LIKE','%'.'pdf'.'%')->latest()->take(6)->get();


        $category = Category::all();
        $publisher = Publisher::all();
        $author = Auther::all();
        $about = AboutUs::first();
      
        return view('std.views.books.papers_index', compact('pap','category','ebooks','author','publisher','contact','about'));

    }


        public function videobookindex()
    {
        $ebooks = Ebook::latest()->paginate(50);
        $category = Category::all();
        $publisher = Publisher::all();
        $author = Auther::all();
        $contact=ContactUs::first();
        $about = AboutUs::first();
        $vid =Ebook::where('videobook','LIKE','%'.'mp4'.'%')->latest()->take(6)->get();


      
        return view('std.views.books.videobook_index', compact('category','ebooks','author','publisher','contact','about','vid'));

    }


     public function read($id)
    {

        $ebook = Ebook::find($id);
        $contact=ContactUs::first();
        $about = AboutUs::first();


        return view("std.views.books.read_ebook", compact('ebook','contact','about'));
     
    }

     public function download($id)
    {
        
       return response()->download('media/ebook/'.$id);
    }


         public function ebookread($id)
    {

       $ebook = Ebook::find($id);
       $contact=ContactUs::first();
        $about = AboutUs::first();

        return view("std.views.books.read_ebook", compact('ebook','contact','about'));
     
    }

     public function ebookdownload($id)
    {
        
       return response()->download('media/ebook/'.$id);
    }

 
     public function bookdetails($id)
    {

        $book = Book::find($id);
        $author = Auther::orderBy('id','desc')->get();
        $category = Category::all();
        $publisher = Publisher::orderBy('id','desc')->get();
        $contact=ContactUs::first();
        $about = AboutUs::first();



        //dd($book);
        return view("std.views.books.book_details", compact('book','author','category','publisher','contact','about'));

    }
        

        public function bookcategory($id)
    {
        // dd($id);
        $category = Category::all();
        $author = Auther::orderBy('id','desc')->get();
        $book = Book::where('category_id',$id)->get();
        $publisher = Publisher::orderBy('id','desc')->get();
        $contact=ContactUs::first();
        $about = AboutUs::first();

        
        return view("std.views.books.book_category", compact('book','author','category','publisher','contact','about'));

    }


        public function booksearch()
    {
        $search_text = $_GET['query'];
        $books = Book::where('b_title','LIKE','%'.$search_text.'%')
          ->orWhere('b_price','LIKE','%'.$search_text.'%')
          ->get();

        $author = Auther::all();
        $book = Book::all();
        $publisher = Publisher::all();
        $category = Category::all();
        $shelf = Shelf::all();
        $contact = ContactUs::first();
        $about = AboutUs::first();



        return view('std.views.books.search_book',compact('books','contact','author','category','publisher','shelf','about','book'));

    }

        public function ebookcategory($id)
    {
        // dd($id);
        $category = Category::all();
        $author = Auther::orderBy('id','desc')->get();
        $ebooks = Ebook::where('category_id',$id)->get();
        $publisher = Publisher::orderBy('id','desc')->get();
        $contact=ContactUs::first();
        $about = AboutUs::first();

        
        return view("std.views.books.ebook_category", compact('ebooks','author','category','publisher','contact','about'));

    }


        public function a_booksearch()
    {
        $search_text = $_GET['a_query'];
        $authors = Auther::where('a_name','LIKE','%'.$search_text.'%')->get();
        // foreach ($authors as $key => $author) {
        //     echo "<pre>";
        //     print_r($author->book->pluck('id'));
        //     echo "</pre>";
    
        // }
        // dd();
        $books = Book::all();
        $auther = Auther::all();
        $publisher = Publisher::all();
        $category = Category::all();
        $shelf = Shelf::all();
        $contact=ContactUs::first();
        $about = AboutUs::first();


        return view('std.views.books.a_search_book',compact('authors','books','category','publisher','shelf','contact','about','auther'));

    }


        public function a_ebooksearch()
    {
        $search_text = $_GET['aa_query'];
        $authors = Auther::where('a_name','LIKE','%'.$search_text.'%')->get();

        $ebooks = Ebook::all();
        $author = Auther::all();
        $publisher = Publisher::all();
        $category = Category::all();
        $shelf = Shelf::all();
        $contact=ContactUs::first();
        $about = AboutUs::first();


        return view('std.views.books.a_search_ebook',compact('authors','author','ebooks','category','publisher','shelf','contact','about'));

    }


        public function bookauthorsearch($id)
    {
        // dd($id);
        $category = Category::all();
        $author = Auther::find($id);
        $bookauthor = Authorbook::where('auther_id',$author->id)->get();
        // $bookauthor = DB::table('authers')
        //        ->join('authorbooks','authers.id','=','authorbooks.auther_id')
        //        ->select('authers.*','authorbooks.*')
        //        ->get();
        // dd($bookauthor);

        $publisher = Publisher::orderBy('id','desc')->get();
        $books = Book::all();
        $contact=ContactUs::first();
        $about = AboutUs::first();

        // dd($book);
          // dd($bookauthor);

    
        return view("std.views.books.bookauthor_search", compact('books','author','category','publisher','bookauthor','contact','about'));


    }


 
     public function news()
    {

        $news = News::first();
        $contact=ContactUs::first();


        return view("std.views.books.news", compact('news','contact'));

    }
        
    public function followus()
    {

        $contact=ContactUs::first();


        return view("std.views.books.follow", compact('contact'));

    }
       

}