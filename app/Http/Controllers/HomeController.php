<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $featureds = Event::limit(1)->where('status', 1)->where('featured', 1)->whereDate('from', '>=', now())->orderBy('from', 'ASC')->get();

        $most_recents = Event::limit(6)->where('status', 1)->whereDate('from', '>=', now())->orderBy('from', 'ASC')->get();

        return view('home', compact(['most_recents', 'featureds']));
    }
}
