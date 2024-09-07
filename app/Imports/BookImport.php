<?php

namespace App\Imports;

use App\Models\Book;
use App\Models\Auther;
use App\Models\Authorbook;
use App\Models\Category;
use App\Models\Country;
use App\Models\BookSerial;
use App\Models\Shelf;
use App\Models\publisher;
// use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;


class BookImport implements WithHeadingRow, ToCollection
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
    foreach ($rows as $row) {
            // $shelf=Shelf::where('no',$row['sdjk'])->first();
            $category=Category::updateOrCreate([
                'c_name' => $row['c_name'] 
            ]);

             $county=Country::updateOrCreate([
                'country' => $row['country']
            ]);

        $book = Book::updateOrCreate([
            // 'id' => $row['id'],
            'b_title' => $row['b_title'],
            'b_edition' => $row['b_edition'],
            'b_price' => $row['b_price'],
            'b_isbn' => $row['b_isbn'],
            'description' => $row['description'],
            'length' => $row['length'],
            'p_date' => $row['p_date'],
            'total_copies' => $row['total_copies'],
            'avalible_copies' => $row['avalible_copies'],
            'b_image' => $row['b_image'],
            'category_id'=>$category->id,
            'country_id'=>$county->id,
            ]);

        $serials=explode('|', $row['serial_no']);
         foreach($serials as $serial){ 
            $serial=BookSerial::updateOrCreate([
                'serial_no'=>$serial,
                'book_id'=>$book->id
            ]);
         }

        $authors=explode('|', $row['a_name']);
         foreach($authors as $author){   
            $author=Auther::updateOrCreate([
                    'a_name'=>$author
                ]);
            $book->authers()->syncWithoutDetaching($author->id);
        }

        // $shelf=Shelf::updateOrCreate([
        //         's_no'=>$row['s_no']
        //     ]);

        $shelf=explode('|', $row['shelf_no']);
         foreach($shelf as $shf){   
            $shf=Shelf::updateOrCreate([
                    's_no'=>$shf
                ]);
            $book->shelves()->syncWithoutDetaching($shf->id);
        }

        // $publisher=Publisher::updateOrCreate([
        //         'p_name'=>$row['p_name']
        //     ]);

        $publisher=explode('|', $row['p_name']);
         foreach($publisher as $pub){   
            $pub=Publisher::updateOrCreate([
                    'p_name'=>$pub
                ]);
            $book->publishers()->syncWithoutDetaching($pub->id);
        }
       
            // $book->bookserial()->attach($serial->id);
            // $book->shelves()->attach($shelf->id);
            // $book->publishers()->attach($publisher->id);


        }
foreach ($rows as $row) {
        return new Book([
            'c_name' => $row['c_name'],
            'country' => $row['country'],
            
        ]);
    }
    }
}
