@extends('layouts.app')
@section('content')



  <div class="container ">
  @foreach($genres as $genre)	
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6 col-xl-4">
     
        <div class="card text-black">
          <i class="fab fa-apple fa-lg pt-3 pb-1 px-3"></i>
          <img
            src="{{ 'image/genre.jpg'}}"
            class="card-img-top" height =  "50 px" width = "100 px"
            alt="Apple Computer"
          />
         
        
          <div class="card-body">
            <div class="text-center">
              <h5 class="card-title">{{$genre->name}}</h5>
            </div>
           
            <div class="d-flex justify-content-between total font-weight-bold mt-4">
              <span>Style</span><span>{{$genre->style}}</span>
            </div>
          </div>
        </div>
       
      </div>
    </div>
        @endforeach
  </div>




@endsection