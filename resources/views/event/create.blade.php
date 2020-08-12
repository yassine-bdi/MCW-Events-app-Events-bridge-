@extends('layouts.app') 
@section('content')
<div class="container py-4">
  @if($errors->any()) 
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <ul>
    @foreach($errors->all() as $error)
    
        <li>{{$error}}</li>
    @endforeach 
    </ul>
    </div>
    @endif 
<form  method="POST" action="{{route('event.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label >Event title</label>
      <input type="text" class="form-control" placeholder="Enter title" name="title">
    </div>
    <div class="form-group">
        <label >Brief</label>
        <input type="text" class="form-control" placeholder="Enter brief" name="brief">
      </div>
      <div class="form-group">
        <label >Content</label>
        <input type="text" class="form-control" placeholder="Enter content" name="Content">
      </div>
      <div class="form-group">
        <label >Date</label>
        <input type="date" class="form-control" placeholder="date" name="date">
      </div>
      <div class="form-group">
        <label >Country</label>
        <input type="text" class="form-control" placeholder="where?" name="country">
      </div>
    <div class="form-group">
      <label >city</label>
      <input type="text" class="form-control" placeholder="city" name="city">
    </div>
    <div class="form-group">
        <label >Speaker</label>
        <input type="text" class="form-control" placeholder="speaker" name="speaker">
      </div>
      <div class="form-group">
        <label >Poster</label>
        <input type="file" class="form-control" name="image">
      </div>
      
    <button type="submit" class="btn btn-primary">Submit</button>
  </form> 
</div>
  @endsection
