<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;
use DB;
class publicController extends Controller
{
    public function index()
    {
        $listbooks= Book::all();
        $users = DB::table('users')->get();
        $booksN = DB::table('books')->get();
        $genresN = DB::table('genres')->get();
        $activeBorrowN = DB::table('borrows')
        ->select("*")
         ->where(["status", "=", "ACCEPTED"])
         ->get();
        return view('welcome',['books' => $listbooks,'users' => $users,'booksN' => $booksN,'activeBorrowN' => $activeBorrowN,'genresN' => $genresN]);
    }

    public function search(Request $request)
    {
      $search_text = $_GET['search'];
      $results = Book::where('title','LIKE','%'.$search_text.'%')->orWhere('author','LIKE','%'.$search_text.'%')->get();
      return view('search',compact('results'));
    }

    public function list($name)
    {
      $genresN = Genre::all();
      //$name =$request->input('genre');
      $results = Book::where('genre',$name)->get();
      return view('ListByGenre',compact('results','genresN'));
    }
/*
    public function show($id){
      $books = Book::where('id',$id)->get();
      return view('book.show',['books' => $books]);
 
      } */
}

