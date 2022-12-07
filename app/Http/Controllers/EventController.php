<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // return Http::dd()->get('http://10.134.30.27/portal/public/user/list/api');

        return view('event.event');
    }

    public function new()
    {

        // return Http::dd()->get('http://10.134.30.27/portal/public/user/list/api');

        return view('event.new');
    }

    public function show(Request $request)
    {

        $event_details = Event::findOrFail($request->id);

        return view('event.details', compact(['event_details']));
    }

    public function create(Request $request)
    {

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'date_schedule' => ['required'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        $dateArray = explode(" - ", $request->date_schedule);
        $from = strtotime($dateArray[0]);
        $to = strtotime($dateArray[1]);

        Event::create([
            'title' => $request->title,
            'venue' => $request->venue,
            'address' => strtoupper($request->address),
            'from' => date('Y/m/d H:i:s', $from),
            'to' => date('Y/m/d H:i:s', $to),
            'remarks' =>  $request->remarks,

        ]);

        return redirect()->back()->with('success', $request->title . ' has been created.');
    }

    public function update(Request $request)
    {


        $request->validate([

            'title' => ['required', 'string', 'max:255'],
            'date_schedule' => ['required'],

            'address' => ['required', 'string', 'max:255'],

        ]);


        $dateArray = explode(" - ", $request->date_schedule);

        $from = strtotime($dateArray[0]);
        $to = strtotime($dateArray[1]);

        $event = Event::findOrFail($request->event_id);



        $event->title = $request->title;
        $event->venue = $request->venue;
        $event->address = strtoupper($request->address);
        $event->from = date('Y/m/d H:i:s', $from);
        $event->to = date('Y/m/d H:i:s', $to);
        $event->remarks = $request->remarks;
        $event->save();
        return redirect()->back()->with('success', $event->title . ' has been edited.');
    }

    public function list(Request $request)
    {

        if ($request->ajax()) {
            $query = Event::select('*');


            return datatables()->eloquent($query)
                ->editColumn('title', function (Event $event) {

                    return '<a  class="text-blue-500 font-bold hover:underline" href="' . route('event.details', $event->id) . '" target="_blank"><i class="fa-solid fa-eye"></i> ' . $event->title . '</a>';
                })
                ->rawColumns(['title'])

                ->toJson();
        }
    }
}
