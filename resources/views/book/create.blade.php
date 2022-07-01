@extends('layouts.app')
@section('content')


<div class="container mt-3">
  <h2>Add New Book</h2>
  <form action="{{route('book.index')}}" method= "POST" enctype="multipart/form-data">
  {{csrf_field()}}
    <div class="mb-3 mt-3 @if($errors->get('title')) has-error @endif">
      <input type="text" class="form-control" id="title"  value="{{old('title')}}" placeholder="Enter Title" name="title">
      @if($errors->get('title'))
                 @foreach($errors->get('title') as $message)
                 <li>{{$message}}</li>
                 @endforeach
               @endif
    </div>
    <div class="mb-3 @if($errors->get('author')) has-error @endif">
      
      <input type="text" class="form-control" id="author" value="{{old('author')}}" placeholder="Enter Author" name="author">
      @if($errors->get('author'))
                 @foreach($errors->get('author') as $message)
                 <li>{{$message}}</li>
                 @endforeach
               @endif
    </div>
    <div class="mb-3 @if($errors->get('description')) has-error @endif">
    <textarea class="form-control" id="description" placeholder="Enter description"  name="description" rows="4" cols="50">{{old('description')}}</textarea>
    @if($errors->get('description'))
                 @foreach($errors->get('description') as $message)
                 <li>{{$message}}</li>
                 @endforeach
               @endif
    </div>

    <div class="mb-3 @if($errors->get('released_at')) has-error @endif">

      <input type="date" class="form-control" id="released_at" placeholder="Enter release date" value="{{old('released_at')}}" name="released_at">
      @if($errors->get('released_at'))
                 @foreach($errors->get('released_at') as $message)
                 <li>{{$message}}</li>
                 @endforeach
               @endif
    </div>

    <div class="mb-3 @if($errors->get('cover_image')) has-error @endif">
     
    <input type="file" class="form-control" value="{{old('cover_image')}}" id="cover_image"  placeholder="Upload Cover Image" name="cover_image">
      @if($errors->get('cover_image'))
                 @foreach($errors->get('cover_image') as $message)
                 <li>{{$message}}</li>
                 @endforeach
               @endif
    </div>

    <div class="mb-3 @if($errors->get('pages')) has-error @endif">
      
      <input type="numeric" class="form-control" id="pages" value="{{old('pages')}}" placeholder="Enter pages number" name="pages">
      @if($errors->get('pages'))
                 @foreach($errors->get('pages') as $message)
                 <li>{{$message}}</li>
                 @endforeach
               @endif
    </div>

    <div class="mb-3 @if($errors->get('language_code')) has-error @endif">
      
      <input type="text" class="form-control" id="language_code" value="{{old('language_code')}}" placeholder="Enter Lang CODE" name="language_code">
      @if($errors->get('language_code'))
                 @foreach($errors->get('language_code') as $message)
                 <li>{{$message}}</li>
                 @endforeach
               @endif
    </div>
    <div class="mb-3 @if($errors->get('isbn')) has-error @endif">
      
      <input type="text" class="form-control" id="isbn" value="{{old('isbn')}}" placeholder="Enter ISBN" name="isbn">
      @if($errors->get('isbn'))
                 @foreach($errors->get('isbn') as $message)
                 <li>{{$message}}</li>
                 @endforeach
               @endif
    </div>
    <div class="mb-3 @if($errors->get('in_stock')) has-error @endif">
      
      <input type="number" class="form-control" id="in_stock" placeholder="Enter Stock Quantity" value="{{old('in_stock')}}" name="in_stock">
      @if($errors->get('in_stock'))
                 @foreach($errors->get('in_stock') as $message)
                 <li>{{$message}}</li>
                 @endforeach
               @endif
    </div>

    <div class="mb-3 @if($errors->get('genre')) has-error @endif">
    <select name="genre" class="form-select @error('genre') is-invalid @enderror" aria-label="Default select example">
                          <option selected>No genre Set</option>
                          @foreach($genres as $genre)
                          <option value="{{$genre->name}}">{{$genre->name}}</option>
                          @endforeach
                    </select>
                    @if($errors->get('genre'))
                 @foreach($errors->get('genre') as $message)
                 <li>{{$message}}</li>
                 @endforeach
               @endif
    </div>
   
    <button href="{{url('/book')}}"  type="submit" class="btn btn-primary">save</button>
  </form>
</div>


@endsection