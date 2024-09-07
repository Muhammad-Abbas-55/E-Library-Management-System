<?php

namespace App\Exports;

use App\Models\Book;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;



class BookExport implements  WithMapping, WithHeadings, FromQuery
{
	use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        return[
            'ID',
            'b_title',
            'b_edition',
            'b_price',
            'b_isbn',
            'description',
            'length',
            'p_date',
            'total_copies',
            'avalible_copies',
            'c_name',
            'country',
            'serial_no',
            'a_name',
            'shelf_no',
            'p_name',
            'b_image',      

        ];
    }

       public function query()
    {

        return Book::query();
    }
    public function map($book): array
    {

        $authors=[];
        foreach($book->authers as $aubook){   
                    $authors[]=$aubook->a_name;
        }
        $authors=implode('|', $authors);

        $shelf=[];
        foreach($book->shelves as $sh_no){   
                    $shelf[]=$sh_no->s_no;
        }
        $shelf=implode('|', $shelf);


        $publisher=[];
        foreach($book->publishers as $pub){   
                    $publisher[]=$pub->p_name;
        }
        $publisher=implode('|', $publisher);

        $s_no=[];
        if(isset($book->bookserial))
        {
            foreach($book->bookserial as $sno){   
                $s_no[]=$sno->serial_no;
            }
        $s_no=implode('|', $s_no);
            
        }

        $c_name="";
        if(isset($book->category))
            $c_name=$book->category->c_name;

        $co_name="";
        if(isset($book->country))
            $co_name=$book->country->country;



    	return[
    		$book->id,
    		$book->b_title,
    		$book->b_edition,
    		$book->b_price,
    		$book->b_isbn,
    		$book->description,
    		$book->length,
    		$book->p_date,
    		$book->total_copies,
    		$book->avalible_copies,
    		$c_name,
            $co_name,
            $s_no,
            $authors,
            $shelf,
            $publisher,
    		$book->b_image,

    	];
    }


}
