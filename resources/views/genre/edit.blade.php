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
  <h2>Edit Gendre</h2>

  <form  action="{{url('genre/'.$genre->id)}}" method="post"> 
           <input type="hidden" name="_method" value="PUT">
                {{csrf_field()}}

                <div class="mb-3 mt-3 ">
      <input type="text" class="form-control" id="name"  value="{{$genre->name}}"  placeholder="Enter Name" name="name">

    </div>
    
    <div class="mb-3">
      
    <select name="style" value="{{$genre->style}}"  class="form-select" aria-label="Default select example">
                          <option selected>Select Style..</option>
                          <option value="primary">Primary</option>
                          <option value="secondary">Secondary</option>
                          <option value="success">Success</option>
                          <option value="danger">Danger</option>
                          <option value="warning">Warning</option>
                          <option value="info">Info</option>
                          <option value="light">Light</option>
                          <option value="dark">Dark</option>
                    </select>
      
    </div>
   
    <button  type="submit" class="btn btn-primary">save</button>
  </form>
</div>


@endsection               