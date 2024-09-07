@extends('std.layouts.sub_layout')
@section('title', 'E-Book Index')

@section('tophead')
    View E-Book
@endsection

@section('head')
    <li><a href="{{ route('ebookindex') }}">E-Book Page</a></li>
    Read Page
@endsection
@section('content')
    <?php
    
    // use DB;
    use App\Models\Auther;
    use App\Models\Ebook;
    use App\Models\Authorbook;
    use App\Models\Category;
    
    ?>


    <div class="container p-4">
        <div class="row">
            <div class="col-md-12 text-center">
                <br />
                <div class="table-responsive"
                    style="padding: 1%;  border-radius: 0%; font-size: 17px; background: #4169e1; color: #fff">
                    <p>Thank you for visiting this Page</p>
                    <h2><strong>Title :</strong> {{ $ebook->title ?? '' }}</h2>
                </div>

                @if (isset($ebook->pdfbook))
                    <iframe src="{{ asset('media/ebook/' . $ebook->pdfbook) }}"
                        style="width: 100%; height: 900px; float: center; "></iframe>
                    <div class="table-responsive"
                        style="padding: 1%;  border-radius: 0%; font-size: 17px; background: #4169e1; color: #fff">
                        <h2><strong>More Details About :</strong> {{ $ebook->title ?? '' }}</h2>
                    </div>
                @endif
                @if (isset($ebook->audiobook))
                    <audio controls autoplay src="{{ url('media/ebook/' . $ebook->audiobook) }}"
                        style="width: 100%; float: center;">
                    </audio>
                    <div class="table-responsive"
                        style="padding: 1%; border-radius: 0%; font-size: 17px; background: #4169e1; color: #fff">
                        <h2><strong>More Details About :</strong> {{ $ebook->title }}</h2>
                        <p><strong>Instructure Name :</strong> {{ $ebook->inst }}</p>
                    </div>
                @endif
                @if (isset($ebook->magazine))
                    <iframe src="{{ url('media/ebook/' . $ebook->magazine) }}"
                        style="width: 100%; height: 900px; float: center; "></iframe>
                    <div class="table-responsive"
                        style="padding: 1%;  border-radius: 0%; font-size: 17px; background: #4169e1; color: #fff">
                        <h2><strong>More Details About :</strong> {{ $ebook->title }}</h2>
                    </div>
                @endif
                @if (isset($ebook->papers))
                    <iframe src="{{ url('media/ebook/' . $ebook->papers) }}"
                        style="width: 100%; height: 900px; float: center; "></iframe>
                    <div class="table-responsive"
                        style="padding: 1%;  border-radius: 0%; font-size: 17px; background: #4169e1; color: #fff">
                        <h2><strong>More Details About :</strong> {{ $ebook->title }}</h2>
                    </div>
                @endif
                @if (isset($ebook->videobook))
                    <video controls autoplay width="100%" loop>
                        <source src="{{ url('media/ebook/' . $ebook->videobook) }}">
                    </video>
                    <div class="table-responsive"
                        style="padding: 1%; border-radius: 0%; font-size: 17px; background: #4169e1; color: #fff">
                        <h2><strong>More Details About :</strong> {{ $ebook->title }}</h2>
                        <p><strong>Instructure Name :</strong> {{ $ebook->instructure }}</p>
                    </div>
                @endif

                @if (isset($ebook))
                    
               
                @foreach ($ebook as $ebooks)
                    <?php
                    $bk = Ebook::where('id', $ebook->id)->first();
                    $authorbooks = [];
                    if (isset($bk->title)) {
                        $authorbooks = DB::table('authorbooks')
                            ->join('authers', 'authorbooks.auther_id', '=', 'authers.id')
                            ->join('ebooks', 'authorbooks.ebook_id', '=', 'ebooks.id')
                            ->where('authorbooks.ebook_id', $bk->id)
                            ->select('*')
                            ->get();
                        // dd($authorbooks);
                    }
                    
                    $bookpublishers = [];
                    if (isset($bk->title)) {
                        $bookpublishers = DB::table('bookpublishers')
                            ->join('publishers', 'bookpublishers.publisher_id', '=', 'publishers.id')
                            ->join('ebooks', 'bookpublishers.ebook_id', '=', 'ebooks.id')
                            ->where('bookpublishers.ebook_id', $bk->id)
                            ->select('*')
                            ->get();
                        // dd($bookpublishers);
                    }
                    
                    ?>
                @endforeach
                @endif
                <div class="table-responsive"
                    style="padding: 1%;  border-radius: 0%; font-size: 17px; background: #4169e1; color: #fff">
                    <p><strong>E-Book Edition :</strong> {{ $ebook->edition }}</p>
                    <p><strong>Book Category :</strong> {{ $ebook->category->c_name }}</p>
                    <p><strong>Book Auther :</strong>
                        @foreach ($authorbooks as $aubook)
                            {{ $aubook->a_name }}<br>
                        @endforeach
                    </p>
                    <p><strong>Book Publisher :</strong>
                        @foreach ($bookpublishers as $pub)
                            {{ $pub->p_name }}<br>
                        @endforeach
                    </p>
                    <p><strong>Publisher Country :</strong> {{ $ebook->country->country }}</p>
                    <p><strong>Publish Date :</strong> {{ $ebook->p_date }}</p>
                </div>
            </div>
        </div>
    </div>

@endsection
