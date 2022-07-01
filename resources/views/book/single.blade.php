@extends('layouts.app')
@section('content')



  <div class="container ">
  @foreach($books as $book)	
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6 col-xl-4">
     
        <div class="card text-black">
          <i class="fab fa-apple fa-lg pt-3 pb-1 px-3"></i>
          <img
            src="{{ '/storage/'.substr($book->cover_image ,7)}}"
            class="card-img-top" height =  "70 px" width = "50 px"
            alt="Apple Computer"
          />
         
        
          <div class="card-body">
            <div class="text-center">

              <h5 class="card-title">{{$book->title}}</h5>
              <p class="text-muted mb-4">{{$book->author}}</p>
            </div>
            <div>
              <div class="d-flex justify-content-between">
                <span>Released At</span><span>{{$book->released_at}}</span>
              </div>
              <div class="d-flex justify-content-between">
                <span>Pages</span><span>{{$book->pages}}</span>
              </div>
              <div class="d-flex justify-content-between">
                <span>ISBN</span><span>{{$book->isbn}}</span>
              </div>
              <div class="d-flex justify-content-between">
                <span>Language CODE</span><span>{{$book->language_code}}</span>
              </div>
              <div class="d-flex justify-content-between">
                <span>Genre</span><span>{{$book->genre}}</span>
              </div>
              <div class="d-flex justify-content-between">

              </div>
            </div>
            <div class="d-flex justify-content-between total font-weight-bold mt-4">
              <span>in Stock</span><span>{{$book->in_stock}}</span>
            </div>
          </div>
        </div>
       
      </div>
    </div>
    <main class= "mb-4">
        <h3 class="font-weight-bold mt-4">Description :</h3>
            <p style="color:black">
                {{$book->description}}
            </p>
            <br>
</main>
        @endforeach
  </div>




@endsection