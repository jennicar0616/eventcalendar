<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use DB;
use Illuminate\Support\Facades\Redirect;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                $events = [];
                $data = Events::all();
                if($data->count())
                 {
                    foreach ($data as $key => $value) 
                    {
                        $events[] = Calendar::event(
                            $value->title,
                            true,
                            new \DateTime($value->start_date),
                            new \DateTime($value->end_date.'+1 day'),
                            null,
                            // Add color
                         [
                            'color'=> $value->color,
                             'textColor' => $value->textColor,
                         ]
                        );
                    }
                }
 $calendar =\Calendar::addEvents($events);
 return view('content_events',compact('events','calendar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function display()
     {
     return view("addevent");
     }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'color'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
          ]);
         $events=new Events;
         $events->title=$request->input('title');
         $events->color=$request->input('color');
         $events->start_date=$request->input('start_date');
         $events->end_date=$request->input('end_date');
         $events->save();
         return redirect('eventpage')->with('success','Event Added');
    }

   
    public function show()
    {
       
        $events = Event::all();
     return view('display')->with('events',$events);
    }


}
