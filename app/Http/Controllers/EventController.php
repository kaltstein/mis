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

    public function list(Request $request)
    {

        if ($request->ajax()) {
            $query = Event::select('*');


            return datatables()->eloquent($query)
                ->editColumn('full_date', function (Event $event) {
                    $full_date = $event->from->format('d/m/Y') . '-' . $event->to->format('d/m/Y');
                    return '<span  class="text-gray-900 font-bold><i class="fa-solid fa-eye"></i> ' . $full_date . '</span>';
                })
                ->rawColumns(['full_date'])
                ->toJson();
        }
    }
}
