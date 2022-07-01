@extends('layouts.app')
@section('content')


<div class="container mt-3">
  <h2>Add New Gendre</h2>
  <form enctype="multipart/form-data" action="{{route('genre.index')}}" method= "POST" >
  {{csrf_field()}}
    <div class="mb-3 mt-3 @if($errors->get('name')) has-error @endif">
      <input type="text" class="form-control" id="name"  value="{{old('name')}}" placeholder="Enter Name" name="name">
      @if($errors->get('name'))
                 @foreach($errors->get('name') as $message)
                 <li>{{$message}}</li>
                 @endforeach
               @endif
    </div>
    
    <div class="mb-3 @if($errors->get('style')) has-error @endif">
      
    <select name="style" class="form-select @error('style') is-invalid @enderror" aria-label="Default select example">
                          <option selected>Select Style..</optio>
                          <option value="primary">Primary</option>
                          <option value="secondary">Secondary</option>
                          <option value="success">Success</option>
                          <option value="danger">Danger</option>
                          <option value="warning">Warning</option>
                          <option value="info">Info</option>
                          <option value="light">Light</option>
                          <option value="dark">Dark</option>
                          
                    </select>
      @if($errors->get('style'))
                 @foreach($errors->get('style') as $message)
                 <li>{{$message}}</li>
                 @endforeach
               @endif
    </div>
    
   
    <button href="{{url('/genre')}}"  type="submit" class="btn btn-primary">save</button>
  </form>
</div>


@endsection