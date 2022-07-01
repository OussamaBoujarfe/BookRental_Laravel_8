@extends('layouts.app')
@section('content')


<div class="container mt-3">
  <h2>Add New Book</h2>
  <form action="{{route('borrow.index')}}" method= "POST" enctype="multipart/form-data">
  {{csrf_field()}}
  
  <div class="mb-3 @if($errors->get('in_stock')) has-error @endif">
      
      <input type="number" class="form-control" id="in_stock" placeholder="Enter Stock Quantity" value="{{old('in_stock')}}" name="in_stock">
      @if($errors->get('in_stock'))
                 @foreach($errors->get('in_stock') as $message)
                 <li>{{$message}}</li>
                 @endforeach
               @endif
    </div>
   
    <button href="{{url('/borrow')}}"  type="submit" class="btn btn-primary">save</button>
  </form>
</div>


@endsection