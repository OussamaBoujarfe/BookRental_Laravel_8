@extends('layouts.app')

@section('content')

<title>Genres Management</title>

    <div class = "container">
    <div class="row">
        <div class="col-md-12">
        <h1>List of Genres</h1>
        
        <div style="float: right;" >
         <a href="{{url('genre/create')}}" class="btn btn-success">New Genre?</a>
         </div>
         
        
        <table class="table">
        <head>
            <tr>
                <th>name</th>            
                <th>style</th>               
                <th>created_at</th> 
                <th>Actions</th>
            </tr>
        </head>
        <body>
        @foreach($genres as $genre)
            <tr>
            
                <td>{{$genre->name}}</td>
                <td>{{$genre->style}}</td>
                <td>{{$genre->created_at}}</td>
                <td>
                <form action="{{url('genre/'.$genre->id)}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <a  href="{{url('genre/'.$genre->id.'/show')}}" class="btn btn-primary">Detail</a>
                <a  href="{{url('genre/'.$genre->id.'/edit')}}" class="btn btn-info">Edit</a>
                
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