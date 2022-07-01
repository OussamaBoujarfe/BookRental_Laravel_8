<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Arr;



    class DatabaseSeeder extends Seeder {
 
        public function run()
        {
            $this->call([
                UsersTableSeeder::class,
               BooksTableSeeder::class,
              //  RentersTableSeeder::class
            ]);
        }
     
    }
     
 

