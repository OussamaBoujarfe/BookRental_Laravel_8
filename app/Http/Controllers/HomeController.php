<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;
use Auth;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $listbooks= Book::all();
        $users = DB::table('users')->get();
        $booksN = DB::table('books')->get();
        $genresN = DB::table('genres')->get();
        return view('welcome',['books' => $listbooks,'users' => $users,'booksN' => $booksN,'genresN' => $genresN]);
    }

    public function profile()
    {


        return view('profile');
    }

    public function list($name)
    {
      $genresN = Genre::all();
      //$name =$request->input('genre');
      $results = Book::where('genre',$name)->get();
      return view('ListByGenre',compact('results','genresN'));
    }
}
