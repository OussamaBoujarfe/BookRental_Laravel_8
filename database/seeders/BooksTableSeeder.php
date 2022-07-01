<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use DB;
class BooksTableSeeder extends Seeder
{
    /**
     * @var string
     */
    protected $jsonFile;

    public function __construct()
    {
        $this->jsonFile = database_path('json/books.json');
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->delete();
        
        if (file_exists($this->jsonFile)) {
            $data = json_decode(file_get_contents($this->jsonFile));

            foreach ($data as $obj) {
                $book = Book::make(Arr::only((array)$obj, [
                    'title', 'author',
                    'description','released_at', 'cover_image','pages',
                    'language_code', 'isbn','in_stock'
                ]));
                $book->save();
            }
        }
    }}