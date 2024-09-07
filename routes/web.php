<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
// Raja
Route::get('/', function () {
    return view('welcome');
});


/*--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------*/
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.views.dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/profile', function () {
    return view('admin.views.profile');
})->name('profile');






/*--------------------------------------------------------------------------
| Student Staff Login Routes
|--------------------------------------------------------------------------*/

Route::get('/login_dashboard','App\Http\Controllers\FrontendController@logindash')->name('logindash');


Route::get('student-login','App\Http\Controllers\StudentController@login')->name('student.login');
Route::post('stdf-logout','App\Http\Controllers\StudentController@logout')->name('stdf.logout');
Route::post('student-checkLogin','App\Http\Controllers\StudentController@checkLogin')->name('student.checkLogin');

Route::get('staff-login','App\Http\Controllers\StaffController@login')->name('staff.login');
Route::post('staff-checkLogin','App\Http\Controllers\StaffController@checkLogin')->name('staff.checkLogin');


/*--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------*/


Route::get('std','App\Http\Controllers\FrontendController@std')->name('index');
Route::get('bookindex','App\Http\Controllers\FrontendController@bookindex')->name('bookindex');
Route::get('ebookindex','App\Http\Controllers\FrontendController@ebookindex')->name('ebookindex');
Route::get('audiobookindex','App\Http\Controllers\FrontendController@audiobookindex')->name('audiobookindex');
Route::get('videobookindex','App\Http\Controllers\FrontendController@videobookindex')->name('videobookindex');
Route::get('magazineindex','App\Http\Controllers\FrontendController@magazineindex')->name('magazineindex');
Route::get('papersindex','App\Http\Controllers\FrontendController@papersindex')->name('papersindex');
Route::get('read_ebook/{id}','App\Http\Controllers\FrontendController@read')->name('ebook.read');
Route::get('file_ebook/download/{pdfbook}','App\Http\Controllers\FrontendController@download')->name('e_book.download');


Route::get('search_book','App\Http\Controllers\FrontendController@booksearch')->name('search.book');
Route::get('e_book_search','App\Http\Controllers\EbookController@booksearch')->name('e_book.search');
Route::get('a_search_book','App\Http\Controllers\FrontendController@a_booksearch')->name('a_search.book');
Route::get('a_search_ebook','App\Http\Controllers\FrontendController@a_ebooksearch')->name('a_search.ebook');

Route::get('bookdetails/{id}','App\Http\Controllers\FrontendController@bookdetails')->name('bookdetails');
Route::get('bookcategory/{id}','App\Http\Controllers\FrontendController@bookcategory')->name('bookcategory');
Route::get('ebookcategory/{id}','App\Http\Controllers\FrontendController@ebookcategory')->name('ebookcategory');
Route::get('bookauthorsearch/{id}','App\Http\Controllers\FrontendController@bookauthorsearch')->name('bookauthorsearch');
Route::get('news_events','App\Http\Controllers\FrontendController@news')->name('news.events');
Route::get('follow_us','App\Http\Controllers\FrontendController@followus')->name('followus');



/*--------------------------------------------------------------------------
| Feedback Routes
|--------------------------------------------------------------------------*/

Route::get('feedback_create','App\Http\Controllers\FeedbackController@create')->name('feedback.create');
Route::post('feedback_store','App\Http\Controllers\FeedbackController@store');
Route::get('feedback_delete/{id}','App\Http\Controllers\FeedbackController@destroy');

/*--------------------------------------------------------------------------
| Auth Admin Route
|--------------------------------------------------------------------------*/

Route::middleware(['auth:sanctum', 'verified'])->group(function () {


Route::get('/dashboard','App\Http\Controllers\AdminHomeController@dashboard')->name('dashboard');

/*--------------------------------------------------------------------------
| Feedback Routes
|--------------------------------------------------------------------------*/
Route::get('feedback_index','App\Http\Controllers\FeedbackController@index')->name('feedback.index');


/*--------------------------------------------------------------------------
| Contact Us Admin Routes
|--------------------------------------------------------------------------*/

Route::get('contact_show','App\Http\Controllers\ContactUsController@show')->name('contact.show');
Route::get('contact_delete/{id}','App\Http\Controllers\ContactUsController@destroy');
Route::get('contact_create','App\Http\Controllers\ContactUsController@create')->name('contact.create');
Route::post('contact_store','App\Http\Controllers\ContactUsController@store');
Route::get('contact_edit/{id}','App\Http\Controllers\ContactUsController@edit');
Route::post('contact_update/{id}','App\Http\Controllers\ContactUsController@update')->name('contact.update');



/*--------------------------------------------------------------------------
| Books Routes
|--------------------------------------------------------------------------*/
Route::get('book_index','App\Http\Controllers\BookController@index')->name('book.index')->middleware('auth');
Route::get('book_create','App\Http\Controllers\BookController@create')->name('book.create');
Route::post('book_store','App\Http\Controllers\BookController@store');
Route::get('book_show/{book}','App\Http\Controllers\BookController@show')->name('book.show');
Route::get('book_edit/{book}/edit','App\Http\Controllers\BookController@edit');
Route::patch('book_update/{book}','App\Http\Controllers\BookController@update')->name('book.update');
Route::get('book_delete/{id}','App\Http\Controllers\BookController@destroy');




Route::get('book_exportexcel','App\Http\Controllers\BookController@bookexportExcel')->name('book.exportexcel');
Route::get('book_exportcsv','App\Http\Controllers\BookController@bookexportCsv')->name('book.exportcsv');
Route::get('book_exportpdf','App\Http\Controllers\BookController@bookexportpdf')->name('book.exportpdf');

Route::get('book_import','App\Http\Controllers\BookController@bookimport')->name('book.imp');
Route::post('bookimport','App\Http\Controllers\BookController@bimport')->name('book.import');

Route::get('book_search','App\Http\Controllers\BookController@search')->name('book.search');


Route::get('editauther/{id}','App\Http\Controllers\BookController@editauther')->name('editauther');

Route::get('bweeklyreport','App\Http\Controllers\BookController@bweeklyreport')->name('bweekly.report');
Route::get('breport','App\Http\Controllers\BookController@breport')->name('b.report');
Route::post('breportt','App\Http\Controllers\BookController@breportt')->name('b.reportt');
Route::get('cat_report','App\Http\Controllers\BookController@cat_report')->name('cat.report');





/*--------------------------------------------------------------------------
| Admin Role Routes
|--------------------------------------------------------------------------*/
Route::get('role_index','App\Http\Controllers\BookController@roleindex')->name('role.index');
Route::get('role_edit/{role}/edit','App\Http\Controllers\BookController@editrole');
Route::patch('role_update/{role}','App\Http\Controllers\BookController@roleupdate')->name('role.update');
Route::get('role_delete/{id}','App\Http\Controllers\BookController@destroy_admin');


/*--------------------------------------------------------------------------
| Category Routes
|--------------------------------------------------------------------------*/

Route::get('category_index','App\Http\Controllers\CategoryController@index')->name('category.index');
Route::get('category_create','App\Http\Controllers\CategoryController@create')->name('category.create');
Route::post('category_store','App\Http\Controllers\CategoryController@store');
Route::get('category_show/{category}','App\Http\Controllers\CategoryController@show')->name('category.show');
Route::get('category_edit/{category}/edit','App\Http\Controllers\CategoryController@edit');
Route::patch('category_update/{category}','App\Http\Controllers\CategoryController@update')->name('category.update');
Route::get('category_delete/{id}','App\Http\Controllers\CategoryController@destroy');


/*--------------------------------------------------------------------------
| Publisher Routes
|--------------------------------------------------------------------------*/


Route::get('publisher_index','App\Http\Controllers\PublisherController@index')->name('publisher.index');
Route::get('publisher_create','App\Http\Controllers\PublisherController@create')->name('publisher.create');
Route::post('publisher_store','App\Http\Controllers\PublisherController@store');
Route::get('publisher_show/{publisher}','App\Http\Controllers\PublisherController@show')->name('publisher.show');
Route::get('publisher_edit/{publisher}/edit','App\Http\Controllers\PublisherController@edit');
Route::patch('publisher_update/{publisher}','App\Http\Controllers\PublisherController@update')->name('publisher.update');
Route::get('publisher_delete/{id}','App\Http\Controllers\PublisherController@destroy');


/*--------------------------------------------------------------------------
| Country Routes
|--------------------------------------------------------------------------*/

Route::get('country_index','App\Http\Controllers\CountryController@index')->name('country.index');
Route::get('country_create','App\Http\Controllers\CountryController@create')->name('country.create');
Route::post('country_store','App\Http\Controllers\CountryController@store');
Route::get('country_show/{country}','App\Http\Controllers\CountryController@show')->name('country.show');
Route::get('country_edit/{country}/edit','App\Http\Controllers\CountryController@edit');
Route::patch('country_update/{country}','App\Http\Controllers\CountryController@update')->name('country.update');
Route::get('country_delete/{id}','App\Http\Controllers\CountryController@destroy');


/*--------------------------------------------------------------------------
| About Routes
|--------------------------------------------------------------------------*/

Route::get('about_index','App\Http\Controllers\AboutUsController@index')->name('about.index');
Route::get('about_create','App\Http\Controllers\AboutUsController@create')->name('about.create');
Route::post('about_store','App\Http\Controllers\AboutUsController@store');
Route::get('about_show/{about}','App\Http\Controllers\AboutUsController@show')->name('about.show');
Route::get('about_edit/{about}/edit','App\Http\Controllers\AboutUsController@edit');
Route::patch('about_update/{about}','App\Http\Controllers\AboutUsController@update')->name('about.update');
Route::get('about_delete/{id}','App\Http\Controllers\AboutUsController@destroy');



/*--------------------------------------------------------------------------
| Student Routes
|--------------------------------------------------------------------------*/

Route::get('student_index','App\Http\Controllers\StudentController@index')->name('student.index');
Route::get('student_create','App\Http\Controllers\StudentController@create')->name('student.create');
Route::post('student_store','App\Http\Controllers\StudentController@store');
Route::get('student_show/{student}','App\Http\Controllers\StudentController@show')->name('student.show');
Route::get('student_edit/{student}/edit','App\Http\Controllers\StudentController@edit');
Route::patch('student_update/{student}','App\Http\Controllers\StudentController@update')->name('student.update');
Route::get('student_delete/{id}','App\Http\Controllers\StudentController@destroy');


Route::get('student_import','App\Http\Controllers\StudentController@studentimport')->name('student.imp');
Route::post('import','App\Http\Controllers\StudentController@import')->name('student.import');

Route::get('student_exportexcel','App\Http\Controllers\StudentController@studentexportExcel')->name('student.exportexcel');
Route::get('student_exportcsv','App\Http\Controllers\StudentController@studentexportCsv')->name('student.exportcsv');




/*--------------------------------------------------------------------------
| Staff Routes
|--------------------------------------------------------------------------*/

Route::get('staff_index','App\Http\Controllers\StaffController@index')->name('staff.index');
Route::get('staff_create','App\Http\Controllers\StaffController@create')->name('staff.create');
Route::post('staff_store','App\Http\Controllers\StaffController@store');
Route::get('staff_show/{staff}','App\Http\Controllers\StaffController@show')->name('staff.show');
Route::get('staff_edit/{staff}/edit','App\Http\Controllers\StaffController@edit');
Route::patch('staff_update/{staff}','App\Http\Controllers\StaffController@update')->name('staff.update');
Route::get('staff_delete/{id}','App\Http\Controllers\StaffController@destroy');

Route::get('staff_import','App\Http\Controllers\StaffController@staffimport')->name('staff.imp');
Route::post('staffimport','App\Http\Controllers\StaffController@import')->name('staff.import');

Route::get('staff_exportexcel','App\Http\Controllers\StaffController@staffexportExcel')->name('staff.exportexcel');
Route::get('staff_exportcsv','App\Http\Controllers\StaffController@staffexportCsv')->name('staff.exportcsv');

/*--------------------------------------------------------------------------
| Books Issue Routes
|--------------------------------------------------------------------------*/

Route::get('bookissue_index','App\Http\Controllers\BookIssueController@index')->name('bookissue.index');
Route::get('bookissue_create','App\Http\Controllers\BookIssueController@create')->name('bookissue.create');
Route::post('bookissue_store','App\Http\Controllers\BookIssueController@store');
Route::get('bookissue_show/{bookissue}','App\Http\Controllers\BookIssueController@show')->name('bookissue.show');
Route::get('bookissue_edit/{bookissue}/edit','App\Http\Controllers\BookIssueController@edit');
Route::patch('bookissue_update/{bookissue}','App\Http\Controllers\BookIssueController@update')->name('bookissue.update');
Route::get('bookissue_delete/{id}','App\Http\Controllers\BookIssueController@destroy');

Route::get('getregistration/{id}','App\Http\Controllers\BookIssueController@getregistration')->name('book.getregistration');
Route::get('getregistrationn/{id}','App\Http\Controllers\BookIssueController@getregistrationn')->name('book.getregistrationn');

Route::get('getquantity/{id}','App\Http\Controllers\BookIssueController@getquantity')->name('book.getquantity');
Route::get('totalcopies/{id}','App\Http\Controllers\BookIssueController@totalcopies')->name('book.totalcopies');
Route::get('avalible_copies/{id}','App\Http\Controllers\BookIssueController@avaliblecopies')->name('book.avaliblecopies');


Route::get('check_copies','App\Http\Controllers\BookIssueController@check_copies')->name('check_copies.available');

Route::get('bookissue_searchstd','App\Http\Controllers\BookIssueController@searchstd')->name('bookissue.searchstd');
Route::get('bookissue_searchstf','App\Http\Controllers\BookIssueController@searchstf')->name('bookissue.searchstf');



Route::get('report','App\Http\Controllers\BookIssueController@report')->name('report');
Route::get('dailyreport','App\Http\Controllers\BookIssueController@dailyreport')->name('daily.report');
Route::get('issuereport','App\Http\Controllers\BookIssueController@issuereport')->name('issue.report');
Route::post('issuereportt','App\Http\Controllers\BookIssueController@issuereportt')->name('issue.reportt');


Route::get('bookissuereportstd','App\Http\Controllers\BookIssueController@bookissuereportstd')->name('bookissue.reportstd');
Route::get('bookissuereportstf','App\Http\Controllers\BookIssueController@bookissuereportstf')->name('bookissue.reportstf');



Route::get('accegt/{id}','App\Http\Controllers\BookIssueController@accegt')->name('book.accegt');





/*--------------------------------------------------------------------------
| Books Return Routes
|--------------------------------------------------------------------------*/

Route::get('bookreturn_index','App\Http\Controllers\BookReturnController@index')->name('bookreturn.index');
Route::get('bookreturn_create','App\Http\Controllers\BookReturnController@create')->name('bookreturn.create');
Route::post('bookreturn_store','App\Http\Controllers\BookReturnController@store');
// Route::post('bookreturn_fststus_store','App\Http\Controllers\BookReturnController@bookreturn_fststus_store');
Route::get('bookreturn_show/{bookreturn}','App\Http\Controllers\BookReturnController@show')->name('bookreturn.show');
Route::get('bookreturn_edit/{bookreturn}/edit','App\Http\Controllers\BookReturnController@edit');
Route::patch('bookreturn_update/{bookreturn}','App\Http\Controllers\BookReturnController@update')->name('bookreturn.update');
Route::get('bookreturn_delete/{id}','App\Http\Controllers\BookReturnController@destroy');

Route::get('getdate/{id}','App\Http\Controllers\BookReturnController@getdate')->name('book.getdate');

Route::get('bookgt/{id}','App\Http\Controllers\BookReturnController@bookgt')->name('book.bookgt');
Route::get('bookg/{id}','App\Http\Controllers\BookReturnController@bookg')->name('book.bookg');

Route::get('getlatefine/{id}','App\Http\Controllers\BookReturnController@getlatefine')->name('book.getlatefine');

Route::get('dailyreportt','App\Http\Controllers\BookReturnController@dailyreportt')->name('daily.reportt');
Route::get('weeklyreportt','App\Http\Controllers\BookReturnController@weeklyreportt')->name('weekly.reportt');
Route::get('returnreport','App\Http\Controllers\BookReturnController@returnreport')->name('return.report');
Route::post('returnreportt','App\Http\Controllers\BookReturnController@returnreportt')->name('return.reportt');


Route::get('/send-mail','App\Http\Controllers\BookReturnController@sendEmail')->name('send.email');

/*--------------------------------------------------------------------------
| Fine Routes
|--------------------------------------------------------------------------*/

Route::get('fine_index','App\Http\Controllers\FineController@index')->name('fine.index');
Route::get('fine_create','App\Http\Controllers\FineController@create')->name('fine.create');
Route::post('fine_store','App\Http\Controllers\FineController@store');
Route::get('fine_show/{fine}','App\Http\Controllers\FineController@show')->name('fine.show');
Route::get('fine_edit/{fine}/edit','App\Http\Controllers\FineController@edit');
Route::patch('fine_update/{fine}','App\Http\Controllers\FineController@update')->name('fine.update');
Route::get('fine_delete/{id}','App\Http\Controllers\FineController@destroy');




/*--------------------------------------------------------------------------
| Author Routes
|--------------------------------------------------------------------------*/

Route::get('author_index','App\Http\Controllers\AutherController@index')->name('author.index');
Route::get('author_create','App\Http\Controllers\AutherController@create')->name('author.create');
Route::post('author_store','App\Http\Controllers\AutherController@store');
Route::get('author_show/{author}','App\Http\Controllers\AutherController@show')->name('author.show');
Route::get('author_edit/{author}/edit','App\Http\Controllers\AutherController@edit');
Route::patch('author_update/{author}','App\Http\Controllers\AutherController@update')->name('author.update');
Route::get('author_delete/{id}','App\Http\Controllers\AutherController@destroy');



/*--------------------------------------------------------------------------
| Shelf Routes
|--------------------------------------------------------------------------*/

Route::get('shelf_index','App\Http\Controllers\ShelfController@index')->name('shelf.index');
Route::get('shelf_create','App\Http\Controllers\ShelfController@create')->name('shelf.create');
Route::post('shelf_store','App\Http\Controllers\ShelfController@store');
Route::get('shelf_show/{shelf}','App\Http\Controllers\ShelfController@show')->name('shelf.show');
Route::get('shelf_edit/{shelf}/edit','App\Http\Controllers\ShelfController@edit');
Route::patch('shelf_update/{shelf}','App\Http\Controllers\ShelfController@update')->name('shelf.update');
Route::get('shelf_delete/{id}','App\Http\Controllers\ShelfController@destroy');


/*--------------------------------------------------------------------------
| Ebooks Routes
|--------------------------------------------------------------------------*/

Route::get('ebook_index','App\Http\Controllers\EbookController@index')->name('ebook.index');
Route::get('ebook_create','App\Http\Controllers\EbookController@create')->name('ebook.create');
Route::post('/ebook_store','App\Http\Controllers\EbookController@store');
Route::get('ebook_show/{ebook}','App\Http\Controllers\EbookController@show')->name('ebook.show');
Route::get('ebook_edit/{ebook}/edit','App\Http\Controllers\EbookController@edit');
Route::patch('ebook_update/{ebook}','App\Http\Controllers\EbookController@update')->name('ebook.update');
Route::get('ebook_delete/{id}','App\Http\Controllers\EbookController@destroy');

Route::get('ebook_read/{id}','App\Http\Controllers\EbookController@read')->name('ebook.read');
Route::get('ebook_file/download/{pdfbook}','App\Http\Controllers\EbookController@download')->name('ebook.download');

Route::get('editauther/{id}','App\Http\Controllers\EbookController@editauther')->name('editauther');

Route::get('ebook_search','App\Http\Controllers\EbookController@search')->name('ebook.search');



/*--------------------------------------------------------------------------
| News & Events Routes
|--------------------------------------------------------------------------*/


Route::get('news_index','App\Http\Controllers\NewsController@index')->name('news.index');
Route::get('news_create','App\Http\Controllers\NewsController@create')->name('news.create');
Route::post('news_store','App\Http\Controllers\NewsController@store');
Route::get('news_show/{news}','App\Http\Controllers\NewsController@show')->name('news.show');
Route::get('news_edit/{news}/edit','App\Http\Controllers\NewsController@edit');
Route::patch('news_update/{id}','App\Http\Controllers\NewsController@update')->name('news.update');
Route::get('news_delete/{id}','App\Http\Controllers\NewsController@destroy');

});





