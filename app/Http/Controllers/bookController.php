<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Book;
use App\Models\Genre;
use App\Http\Requests\bookRequest;

class bookController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
      
          }
    public function index()
    {
        $listbooks= Book::all();
        return view('book.index',['books' => $listbooks]);
    }


       public function create()
    {
        $genres = Genre::all();
        return view('book.create',['genres' => $genres]);
    }

    public function store(bookRequest $req)
    {

           $book= new book();
           $book->title= $req->input('title');
           $book->author= $req->input('author');
           $book->released_at= $req->input('released_at');
           $book->cover_image= $req->file('cover_image')->store('public/uploads');
           $book->description= $req->input('description');
           $book->pages= $req->input('pages');
           $book->language_code= $req->input('language_code');
           $book->isbn= $req->input('isbn');
           $book->in_stock= $req->input('in_stock');
           $book->genre= $req->input('genre');
           $book->save();
           return redirect('book')->with('success','Book added Successfully');
    }

    public function edit($id)
    {
        $book= Book::find($id);
        $listgenres= Genre::all();
        return view('book.edit',['book'=>$book,'listgenres'=>$listgenres]);
    }

    public function update(bookRequest $req ,$id)
    {
        $book= Book::find($id);
        $book->title= $req->input('title');
           $book->author= $req->input('author');
           $book->released_at= $req->input('released_at');
          $book->cover_image= $req->file('cover_image')->store('public/uploads');
           $book->pages= $req->input('pages');
           $book->language_code= $req->input('language_code');
           $book->isbn= $req->input('isbn');
           $book->in_stock= $req->input('in_stock');
           $book->genre= $req->input('genre');
        $book->save();
        return redirect('book')->with('success','Book is edited ');
        
      
    }
    public function show($id){
     $books = Book::where('id',$id)->get();
     return view('book.show',['book' => $books]);

     } 

    
    public function destroy(Request $req, $id){
     $book=Book::find($id);
     $book->delete();
     return redirect('book')->with('success','Book is deleted softly ');;
    }

}
