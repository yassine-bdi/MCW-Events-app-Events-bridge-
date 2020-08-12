@extends('layouts.app')

@section('content') 
 <div class="container py-4">
<form  method="POST" action="{{ route('event.update',[$events , 'id' => $events->id  ]) }}">
    
    @csrf
    @method('PUT')
    
    @if($errors->any()) 
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    @foreach($errors->all() as $error)
    <ul>
        <li> {{$error}}</li>
    @endforeach 
    </ul>
    </div>
    @endif 
    <div class="form-group">
        <label>Edit title</label>
        <input type="text" class="form-control" name="title" value="{{$events->title}}" >
    </div>
    <div class="form-group">
        <label>Edit brief</label>
        <input type="text" class="form-control" name="brief" value="{{$events->brief}}" >
    </div>
    <div class="form-group">
        <label>Edit content</label>
        <input type="text" class="form-control" name="content" value="{{$events->content}}" >
    </div>
    <div class="form-group">
        <label>Edit date</label>
        <input type="date" class="form-control" name="date" placeholder="{{$events->date}}" >
    </div>
    <div class="form-group">
        <label>Edit Country</label>
        <input type="text" class="form-control" name="country" value="{{$events->country}}" >
    </div>
    <div class="form-group">
        <label>Edit city</label>
        <input type="text" class="form-control" name="city" value="{{$events->city}}" >
    </div>
    <div class="form-group">
        <label>Edit speaker</label>
        <input type="text" class="form-control" name="speaker" value="{{$events->speaker}}" >
    </div>
    
    
    <div class="form-group">
    <input type="submit" class="btn btn-success" value="Submit">
    </div>
</form>
<h2> Add Session </h2>
<form  method="POST" action="{{route("addsession",$events->id)}}">
    
    @csrf
    <div class="form-group">
        <label>Session Title</label>
        <input type="text" class="form-control" name="title"  >
    </div>
    <div class="form-group">
        <label>Session Content</label>
        <input type="text" class="form-control" name="content"  >
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Submit">
        </div>
</form>

</div>

@endsection

