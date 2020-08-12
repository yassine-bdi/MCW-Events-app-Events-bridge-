@extends('layouts.app')

@section('content')

<div >
<div style="text-align: center; color:white;   background:url(../91.jpg)">
<h1 style="padding:20px; font-size:110px">BRIDGE EVENTS</h2>

<h1 style="align: center">UPCOMING EVENTS</h1>
<br><br><br>
</div>
<br><br>
    <div class="container">
        @if(session()->has('statut'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
           <h5>{{session()->get('statut')}}</h5>
        </div>
        @endif 
        
<button class="btn btn-primary text-white" style="height:50px; width:120px" ><a href="{{route('event.create') }}" class="text-white">create event</a></button>

</div>
<br>
@foreach($events as $event)
<div class="container mt-3">

<div class="card-deck bg-light  rounded-750 shadow 20px 20px ">
    <div class="card-body">

<a href="{{ route('event.show',['event' => $event->id])}}"><h2>{{$event->title}}</h2></a>
<a href="{{route('user.show',$event->user->id)}}" style="font-size: 20px"> {{$event->user->name}}</a>
<h4>{{$event->date}}</h4>
<p>{{$event->brief}}</p>
    </div>
    </div>

</div>
<br><br>
 @endforeach
 <div class="container">
 {{ $events->links() }}
 </div>
</div>

@endsection
