@extends('layouts.app')
@section('content')



  <div class="container ">
  @foreach($bor as $book)	
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6 col-xl-4">
     
        <div class="card text-black">
          <i class="fab fa-apple fa-lg pt-3 pb-1 px-3"></i>
          <img
            src="{{ '/image/rental.png'}}"
            class="card-img-top" height =  "70 px" width = "50 px"
            alt="Apple Computer"
          />
         
        
          <div class="card-body">
            <div class="text-center">
              <a href="{{url('book/'.$book->id.'/show')}}" class="card-title">{{$book->title}}</a>
              <p class="text-muted mb-4">{{$book->author}}</p>
            </div>
            <div>
              <div class="d-flex justify-content-between">
                <span>Released At</span><span>{{$book->released_at}}</span>
              </div>
              <div class="d-flex justify-content-between">
                <span>Borrower</span><span>{{$book->name}}</span>
              </div>
              <div class="d-flex justify-content-between">
                <span>date of rental</span><span>{{$book->created_at}}</span>
              </div>
             
              <div class="d-flex justify-content-between">
                <span>Status</span><span>{{$book->status}}</span>
              </div>
              @if($book->status != "PENDING" && $book->status != "RETURNED")
              <div class="d-flex justify-content-between">
                <span>Procession Date</span><span>{{$book->request_processed_at}}</span>
              </div>
              <div class="d-flex justify-content-between">
                <span>Librarian ID</span><span>{{ App\Models\User::where('id', $book->request_managed_by)->first()->name}}</span>
              </div>
              @elseif($book->status == "RETURNED")
              <div class="d-flex justify-content-between">
                <span>Return Date</span><span>{{$book->returned_at}}</span>
              </div>
              <div class="d-flex justify-content-between">
                <span>Librarian ID</span><span>{{$book->return_managed_by}}</span>
              </div>
              @else

              @endif

            </div>
            
          </div>
        </div>
       
      </div>
    </div>
   
        @endforeach
  </div>




@endsection