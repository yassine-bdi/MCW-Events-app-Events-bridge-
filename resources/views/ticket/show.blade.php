
  <center>  <div style="margin:12%"> 
        <h1> thanks Mr./Mrs. {{$ticket->user->name}} for reserving <br> Enjoy ! </h1> <br>
        <p>-------------------------------------------------------------</p>
        <h2> Event id : &nbsp; {{$ticket->event->id }}
            <br> Ticket id : &nbsp; {{$ticket->id}} <br> reserved at : &nbsp;  {{$ticket->created_at}}<br>
         Event Title : &nbsp; {{$ticket->event->title}}</h2>


        <br><br><br> <button onclick="window.print()">Print</button> </center>

