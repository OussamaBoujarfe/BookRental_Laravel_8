@extends('layouts.app')
@section('content')

@if(count($errors))
<div class="alert alert-danger" role="alert">
<ul>
@foreach($errors->all() as $message)
<li>{{$message}}  </li>
@endforeach
</ul>
</div>
  @endif


<div class="container mt-3">
  <h2>Edit Book</h2>

  <form enctype="multipart/form-data" action="{{url('book/'.$book->id)}}" method="post"> 
           <input type="hidden" name="_method" value="PUT">
                {{csrf_field()}}

    <div class="mb-3 mt-3 ">
      <input type="text" class="form-control" id="title"  value="{{$book->title}}" placeholder="Enter Title" name="title">
      
    </div>
    <div class="mb-3 ">
      
      <input type="text" class="form-control" id="author" value="{{$book->author}}" placeholder="Enter Author" name="author">
     
    </div>
    <div class="mb-3 ">
    <textarea class="form-control" id="description" placeholder="Enter description"  name="description" rows="4" cols="50">{{$book->description}}</textarea>
 
    </div>

    <div class="mb-3 ">

      <input type="date" class="form-control" id="released_at" placeholder="Enter release date" value="{{$book->released_at}}" name="released_at">
      
    </div>

    <div class="mb-3 ">
     
    <input type="file" class="form-control" value="{{$book->cover_image}}" id="cover_image"  placeholder="Upload Cover Image" name="cover_image">
  
    </div>

    <div class="mb-3 ">
      
      <input type="numeric" class="form-control" id="pages" value="{{$book->pages}}" placeholder="Enter pages number" name="pages">
    
    </div>

    <div class="mb-3">
      
      <input type="text" class="form-control" id="language_code" value="{{$book->language_code}}" placeholder="Enter Lang CODE" name="language_code">
      
    </div>
    <div class="mb-3 ">
      
      <input type="text" class="form-control" id="isbn" value="{{$book->isbn}}" placeholder="Enter ISBN" name="isbn">
      
    </div>
    <div class="mb-3 ">
      
      <input type="number" class="form-control" id="in_stock" placeholder="Enter Stock Quantity" value="{{$book->in_stock}}" name="in_stock">
      
    </div>
    <div class="mb-3 ">
    <select name="genre" value="{{$book->genre}}" class="form-select " aria-label="Default select example">
                          <option selected>No Genre Set</option>
                          @foreach($listgenres as $genre)
                          <option value="{{$genre->name}}">{{$genre->name}}</option>
                          @endforeach
                    </select>
                   
    </div>
   
    <button  type="submit" class="btn btn-primary">save</button>
  </form>
</div>


@endsection               