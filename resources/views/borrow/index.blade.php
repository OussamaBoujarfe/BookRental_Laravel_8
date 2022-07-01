@extends('layouts.app')

@section('content')

<title>Rentals Management</title>

    <div class = "container">
    <div class="row">
        <div class="col-md-12">
        <h1>Rental Requests with PENDING</h1>
      
        
        <table class="table">
        <head>
            <tr>
                 <th>Book Title</th>               
                 <th>Book Author</th>          
                 <th>Date of Rental</th>    
                 <th>Deadline</th> 
               
                <th>Actions</th>
            </tr>
        </head>
        <body>
        @foreach($pendingList as $pend)
            <tr>
                <td>{{$pend->book_title}}</td>
                <td>{{$pend->book_author}}</td>      
                <td>{{$pend->created_at}}</td>
                @if($pend->deadline == NULL || $pend->deadline == " ")
                <td>not Set Yet</td>
                @else
                <td>{{$pend->deadline}}</td>
                @endif  
                <td>
                <form action="{{url('borrow/'.$pend->id)}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                
                <a  href="{{url('borrow/'.$pend->id.'/show')}}" class="btn btn-primary">Detail</a>
                @if($userRole)
                <a  href="{{url('borrow/'.$pend->id.'/edit')}}" class="btn btn-info">Process</a>
                @else
                @endif
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </td>
               


            </tr>
            @endforeach
            
        </body>    
        </table>
    
        
        </div>
    </div>
</div>
    <br>
    <div class = "container">
    <div class="row">
        <div class="col-md-12">
        <h1>Accepted and in-time rentals</h1>
      
        
        <table class="table">
        <head>
            <tr>
            <th>Book Title</th>               
                <th>Book Author</th>          
                 <th>Date of Rental</th>    
                <th>Deadline</th> 
               
                <th>Actions</th>
            </tr>
        </head>
        <body>
        @foreach($acceptedInTime as $accep)
            <tr>
            
                <td>{{$accep->book_title}}</td>
                <td>{{$accep->book_author}}</td>      
                <td>{{$accep->created_at}}</td>
                @if($accep->deadline == NULL || $accep->deadline == " ")
                <td>not Set Yet</td>
                @else
                <td>{{$accep->deadline}}</td>
                @endif  
                <td>
                <form action="{{url('borrow/'.$accep->id)}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}

                <a  href="{{url('borrow/'.$accep->id.'/show')}}" class="btn btn-primary">Detail</a>
               
                @if($userRole)
                <a  href="{{url('borrow/'.$accep->id.'/edit')}}" class="btn btn-info">Process</a>
                @else
                @endif              
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </td>
               


            </tr>
            @endforeach
            
        </body>    
        </table>
    
        
        </div>
    </div>
</div>
<br>
<div class = "container">
    <div class="row">
        <div class="col-md-12">
        <h1>Accepted late rentals</h1>
      
        
        <table class="table">
        <head>
            <tr>
            <th>Book Title</th>               
                <th>Book Author</th>          
                 <th>Date of Rental</th>    
                <th>Deadline</th> 
               
               
                <th>Actions</th>
            </tr>
        </head>
        <body>
            

        @foreach($acceptedLate as $accepL)
            <tr>
            
            <td>{{$accepL->book_title}}</td>
                <td>{{$accepL->book_author}}</td>      
                <td>{{$accepL->created_at}}</td>
                @if($accepL->deadline == NULL || $accepL->deadline == " ")
                <td>not Set Yet</td>
                @else
                <td>{{$accepL->deadline}}</td>
                @endif  
                <td>
                <form action="{{url('borrow/'.$accepL->id)}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <a  href="{{url('borrow/'.$accepL->id.'/show')}}" class="btn btn-primary">Detail</a>
                @if($userRole)
                <a  href="{{url('borrow/'.$accepL->id.'/edit')}}" class="btn btn-info">Process</a>
                @else
                @endif                
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </td>
               
           
               


            </tr>
            @endforeach
            
        </body>    
        </table>
    
        
        </div>
    </div>
</div>
<br>
<div class = "container">

    <div class="row">
        <div class="col-md-12">
        <h1>Rejected rental requests</h1>
      
        
        <table class="table">
        <head>
            <tr>
            <th>Book Title</th>               
                <th>Book Author</th>          
                 <th>Date of Rental</th>    
                <th>Deadline</th> 
               
                <th>Actions</th>
            </tr>
        </head>
        <body>
        @foreach($rejected as $r)
            <tr>

            <td>{{$r->book_title}}</td>
                <td>{{$r->book_author}}</td>      
                <td>{{$r->created_at}}</td>
                @if($r->deadline == NULL || $r->deadline == " ")
                <td>not Set Yet</td>
                @else
                <td>{{$r->deadline}}</td>
                @endif  
                <td>
                <form action="{{url('borrow/'.$r->id)}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <a  href="{{url('borrow/'.$r->id.'/show')}}" class="btn btn-primary">Detail</a>

                @if($userRole)
                <a  href="{{url('borrow/'.$r->id.'/edit')}}" class="btn btn-info">Process</a>
                @else
                @endif                
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </td>
               

            </tr>
            @endforeach
            
        </body>    
        </table>
    
        
        </div>
    </div>
</div>
<br>
<div class = "container">
    <div class="row">
        <div class="col-md-12">
        <h1>Returned rentals</h1>

        <table class="table">
        <head>
            <tr>
            <th>Book Title</th>               
                <th>Book Author</th>          
                 <th>Date of Rental</th>    
                <th>Deadline</th> 
               
               
                <th>Actions</th>
            </tr>
        </head>
        <body>
        @foreach($returned as $rej)
            <tr>
            
            <td>{{$rej->book_title}}</td>
                <td>{{$rej->book_author}}</td>      
                <td>{{$rej->created_at}}</td>
                @if($rej->deadline == NULL || $rej->deadline == " ")
                <td>not Set Yet</td>
                @else
                <td>{{$rej->deadline}}</td>
                @endif  
                <td>
                <form action="{{url('borrow/'.$rej->id)}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <a  href="{{url('borrow/'.$rej->id.'/show')}}" class="btn btn-primary">Detail</a>
                @if($userRole)
                <a  href="{{url('borrow/'.$rej->id.'/edit')}}" class="btn btn-info">Process</a>
                @else
                @endif                
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </td>
               
               


            </tr>
            @endforeach
            
        </body>    
        </table>
    
        
        </div>
    </div>
</div>
</div>
@endsection