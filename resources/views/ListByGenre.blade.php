@extends('layouts.app')

@section('content')

        <!-- Section-->
        <section class="py-5">
        
                
<div class="container px-1 px-lg-1 mt-1">
   <div class="row">
  <div >
   
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action disabled active text-font-bold" id="list-home-list"  href="#list-home" role="tab" aria-controls="home">List By Genre</a>
      @foreach($genresN as $genre)
      <a  href = "{{url('/book_by_genre/'.$genre->name)}}" class="list-group-item list-group-item-action list-group-item-{{$genre->style}}" id="list-profile-list"  role="tab" aria-controls="profile">{{$genre->name}}</a>
      @endforeach
      </div>
   
  </div>
</div>
</div>

            <div class="container px-4 px-lg-5 mt-5">
                
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                   @foreach($results as $book) 
                <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            <img class="card-img-top"  src="{{ '/storage/'.substr($book->cover_image ,7)}}" height ="70 px" witth= "50px" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{$book->title}}</h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    
                                    {{$book->author}}
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                           
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{url('book/'.$book->id.'/show')}}" >View Book</a></div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                   
                </div>
                
            </div>
            
        </section>
@endsection
