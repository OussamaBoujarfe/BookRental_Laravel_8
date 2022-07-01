@extends('layouts.app')

@section('content')

<title>Books Management</title>

    <div class = "container">
    <div class="row">
        <div class="col-md-12">
        <h1>Profile</h1>
           
        <body>
        <div class="row justify-content-center">
      <div class="col-md-6 col-lg-4 col-xl-4">
     
          <img
            src="{{ 'image/profile.png'}}"
            class="card-img-top" height =  "10 px" width = "10 px"
            alt="Apple Computer"
          />

          <br><br>
        @if(auth()->user()->is_librarian)
        <p style="color:black "> <span>User Role :</span>   Librarian  </p>
        @else
        <p style="color:black"> <span>My Role :</span>  Reader  </p>
        @endif
        <p style="color:black"> <span>My ID :</span> {{ auth()->user()->id }} </p>
        <p style="color:black"> <span>My Name :</span> {{ auth()->user()->name }} </p>
        <p style="color:black"> <span>My Email :</span> {{ auth()->user()->email }} </p>
        <br><br>
       
        <br><br>
                
        </div>
        </div>
      
        <button type="submit"   class="btn btn-info"><a href="{{ url('/') }}">BACK</a></button>
        
   
        </body>    
      
    
        
        </div>
    </div>
</div>
@endsection