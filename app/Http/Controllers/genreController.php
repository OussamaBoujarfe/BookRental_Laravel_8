<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Http\Requests\genreRequest;
class genreController extends Controller
{


          public function __construct(){
            $this->middleware('auth');
          
              }
    public function index()
    {
        $listgenres= Genre::all();
        return view('genre.index',['genres' => $listgenres]);
    }

     //
     public function create()
     {
         return view('genre.create');
     }
 
     public function store(genreRequest $req)
     {
    
    
            $genre= new genre();
            $genre->name= $req->input('name');
            $genre->style= $req->input('style');
            $genre->save();
            return redirect('genre')->with('success','Genre added Successfully');;
     }
 
     public function edit($id){
         $genre= Genre::find($id);
         return view('genre.edit',['genre'=>$genre]);
     }
     public function update(genreRequest $req ,$id){
         $genre= Genre::find($id);
         $genre->title= $req->input('name');
            $genre->author= $req->input('style');
          
         $genre->save();
         return redirect('genre')->with('success','Genre edited Successfully');;
         
       
     }
     public function show($id){
      $genres = Genre::where('id',$id)->get();
      return view('genre.show',['genres' => $genres]);
 
      } 
     public function destroy(Request $req, $id){
      $genre=Genre::find($id);
      $genre->delete();
      return redirect('genre')->with('success','Genre Deleted Softly Successfully');;
     }
    
}
