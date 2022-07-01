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
  <h2>Edit Book</h2>

  <form enctype="multipart/form-data" action="{{url('borrow/'.$borrow->id)}}" method="post"> 
           <input type="hidden" name="_method" value="PUT">
                {{csrf_field()}}

    <div class="mb-3 mt-3 ">
      <p>Deadline</p>
      <input type="date" class="form-control" id="title"  value="{{$borrow->deadline}}" placeholder="Enter Deadline" name="deadline">
      
    </div>
    <div class="mb-3 ">
    <select name="status" class="form-select " aria-label="Default select example">
                          <option value="ACCEPTED" >ACCEPTED</option>
                          <option value="REJECTED">REJECTED</option>
                          <option value="RETURNED">RETURNED</option>
                         
                          <option selected value="PENDING">PENDING</option>
        
                    </select>
                   
    </div>
   
    
   
    <button  type="submit" class="btn btn-primary">save</button>
  </form>
</div>


@endsection               