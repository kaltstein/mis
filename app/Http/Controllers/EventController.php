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

    public function edit(Request $request)
    {

        $event_details = Event::findOrFail($request->id);

        return view('event.details', compact(['event_details']));
    }

    public function show(Request $request)
    {



        $event_details = Event::where('id', $request->id)->where('status', 1)->firstOrFail();
        $most_recents = Event::limit(2)->where('status', 1)->whereDate('from', '>=', now())->orderBy('from', 'ASC')->get();

        return view('event.view', compact(['event_details', 'most_recents']));
    }

    public function create(Request $request)
    {

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'date_schedule' => ['required'],
            'address' => ['required', 'string', 'max:255'],
            'content' => ['required'],

        ]);

        if ($request->featured == 1) {
            $request->featured = 1;
        } else {
            $request->featured = 0;
        }

        if ($request->status == 1) {
            $request->status = 1;
        } else {
            $request->status = 0;
        }

        $dateArray = explode(" - ", $request->date_schedule);
        $from = strtotime($dateArray[0]);
        $to = strtotime($dateArray[1]);

        if ($request->remarks == "") {
            $request->remarks = "/";
        }
        Event::create([
            'title' => $request->title,
            'venue' => $request->venue,
            'address' => strtoupper($request->address),
            'from' => date('Y/m/d H:i:s', $from),
            'to' => date('Y/m/d H:i:s', $to),
            'content' =>  $request->content,
            'featured' =>  $request->featured,
            'status' =>  $request->status,
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
            'content' => ['required'],

        ]);




        $dateArray = explode(" - ", $request->date_schedule);

        $from = strtotime($dateArray[0]);
        $to = strtotime($dateArray[1]);

        $event = Event::findOrFail($request->event_id);


        error_log($request->status);
        $event->title = $request->title;
        $event->venue = $request->venue;
        $event->address = strtoupper($request->address);
        $event->from = date('Y/m/d H:i:s', $from);
        $event->to = date('Y/m/d H:i:s', $to);


        if ($request->featured == 1) {
            $event->featured = 1;
        } else {
            $event->featured = 0;
        }

        if ($request->status == 1) {
            $event->status = 1;
        } else {
            $event->status = 0;
        }

        $event->content = $request->content;



        if ($request->remarks == "") {
            $request->remarks = "/";
        }
        $event->remarks = $request->remarks;
        $event->save();
        return redirect()->back()->with('success', $event->title . ' has been edited.');
    }

    public function list(Request $request)
    {

        if ($request->ajax()) {
            $query = Event::select('*');

            return datatables()->eloquent($query)

                ->editColumn('action', function (Event $event) {

                    return '
                    <div class="inline-flex rounded-md shadow-sm">
                    <a  class="mb-2 inline-flex items-center  px-3 py-2 text-xs font-medium text-center focus:outline-none text-white bg-purple-600 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-600 dark:focus:ring-purple-900" href="' . route('event.show', $event->id) . '" target="_blank"><i class="fa-solid fa-eye"></i>&nbsp;VIEW ON SITE</a>
                    <a  class="mb-2 inline-flex items-center  px-3 py-2 text-xs font-medium text-center text-white bg-blue-500  hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" href="' . route('event.edit', $event->id) . '" target="_blank"><i class="fa-solid fa-pen"></i></a>
                     
                    </div>
                    ';
                })
                ->editColumn('status', function (Event $event) {
                    if ($event->status == 1) {
                        return '<span class="font-bold text-green-500">• Published</span>';
                    } else {
                        return '<span class="font-bold text-gray-500">• Unpublished</span>';
                    }
                })
                ->rawColumns(['action', 'status'])

                ->toJson();
        }
    }
}
