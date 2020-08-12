<?php

namespace App\Http\Controllers;


use App\Event;
use App\Session;
use App\User; 
use App\Ticket; 
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Redirect;
use function Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;




class EventController extends Controller
{    

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('event.index', [
            'events' => Event::paginate(10)
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("event.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    $request->validate([
        'title' => 'required|max:40', 
        'Content' => 'required', 
        'date' => 'required',
        'country' => 'required', 
        'speaker' => 'required' 

          ]);


        $event = new Event();
        $event->title = $request->input('title');
        $event->brief = $request->input('brief'); 
        $event->content = $request->input('Content');
        $event->date = $request->input('date'); 
        $event->country = $request->input('country'); 
        $event->city = $request->input('city'); 
        $event->speaker = $request->input('speaker');
        $event->user_id = Auth::user()->id;
        
        if($request->has('image')) {
            $request->validate([
                'image' => 'file|image|max:5000'
                  ]);
            $event->profile_image= request()->image->store('uploads','public');  
        }
        

        $event->save();
        $request->session()->flash('statut','post added succefuly'); 
        return EventController::index();

        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return view('event.show', [
            'events' => Event::find($id) , 
           
            
             
            
        ]);
          $sessions =Event::find($id)->sessions; 
            return $sessions; 
         $tickets = Event::find($id)->tickets->latest(); 
           return $tickets; 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $events = Event::find($id); 
        return view('event.edit', ['events' => $events]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$events)
    {        $request->validate([
            'date' => 'required'
              ]);
        $events = Event::find($events); 
        $events->title = $request->input('title');
        $events->brief = $request->input('brief');
        $events->content = $request->input('content');
        $events->date = $request->input('date');
        $events->country = $request->input('country');
        $events->city = $request->input('city');
        $events->speaker = $request->input('speaker');
        
        $events->save();

        $request->session()->flash('statut','post updated succefuly'); 
        return EventController::index();

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $events = Event::find($id);
        $events->delete();
        $request->session()->flash('statut','post was deleted succefuly'); 
        return Redirect::route('event.index');
    }
    public function addsession(Request $request,$id) 
    { 
        $session = new Session(); 
        $session->title = $request->input('title'); 
        $session->content = $request->input('content'); 
        $session->event_id = $id; 
        $session->save(); 
    }
   
}