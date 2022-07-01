@extends('layouts.app')

@section('content')

<title>Books Management</title>

    <div class = "container">
    <div class="row">
        <div class="col-md-12">
        <h1>List of books</h1>
        
        <div style="float: right;" >
         <a href="{{url('book/create')}}" class="btn btn-success">New Book?</a>
         </div>
         
        
        <table class="table">
        <head>
            <tr>
                <th>Title</th>            
                <th>Author</th>               
                <th>ISBN</th> 
                <th>Released at</th>  
                <th>Actions</th>
            </tr>
        </head>
        <body>
        @foreach($books as $book)
            <tr>
            
                <td>{{$book->title}}</td>
                <td>{{$book->author}}</td>
                <td>{{$book->isbn}}</td>
                <td>{{$book->released_at}}</td>
                <td>
                <form action="{{url('book/'.$book->id)}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <a  href="{{url('book/'.$book->id.'/show')}}" class="btn btn-primary">Detail</a>
                <a  href="{{url('book/'.$book->id.'/edit')}}" class="btn btn-info">Edit</a>
                
                <button type="submit" class="btn btn-danger">softDel</button>
                </form>
                </td>
               
               


            </tr>
            @endforeach
            
        </body>    
        </table>
    
        
        </div>
    </div>
</div>
@endsection