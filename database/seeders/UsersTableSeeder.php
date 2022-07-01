<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use DB;

class UsersTableSeeder extends Seeder {
     
    public function run()
    {
        
        DB::table('users')->delete();
      $users =   [[
            'name' => 'user #1',
            'email' => 'librarian@brs.com',
            'is_librarian' => 1,
            'password' => bcrypt('password')
        ],
        [
            'name' => 'user #2',
            'email' => 'reader@brs.com',
            'is_librarian' => 0,
            'password' => bcrypt('password')
        ]];

        foreach($users as $user){
            User::create($user);
        }

    }
 
}

