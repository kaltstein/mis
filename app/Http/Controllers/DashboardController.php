<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        $gender = User::select(User::raw('COUNT(IF(gender = "MALE", 1, NULL)) AS male, COUNT(IF(gender = "FEMALE", 1, NULL)) AS female'))->first();
        $civil_status = User::select(User::raw('COUNT(IF(civil_status = "SINGLE", 1, NULL)) AS single, COUNT(IF(civil_status = "MARRIED", 1, NULL)) AS married
        , COUNT(IF(civil_status = "LIVE IN", 1, NULL)) AS live_in, COUNT(IF(civil_status = "OTHER", 1, NULL)) AS other'))->first();
        $enrolled = User::select(User::raw('COUNT(IF(enrolled = "YES", 1, NULL)) AS enrolled, COUNT(IF(enrolled = "NO", 1, NULL)) AS not_enrolled'))->first();
        $solo_parent = User::select(User::raw('COUNT(IF(solo_parent = "YES", 1, NULL)) AS solo_parent, COUNT(IF(solo_parent = "NO", 1, NULL)) AS not_solo_parent'))->first();
        $pwd = User::select(User::raw('COUNT(IF(pwd = "YES", 1, NULL)) AS pwd, COUNT(IF(pwd = "NO", 1, NULL)) AS not_pwd'))->first();
        $lgbtq = User::select(User::raw('COUNT(IF(lgbtq = "YES", 1, NULL)) AS lgbtq, COUNT(IF(lgbtq = "NO", 1, NULL)) AS not_lgbtq'))->first();

        return view('dashboard', compact(['gender', 'civil_status', 'enrolled', 'solo_parent', 'pwd', 'lgbtq']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
