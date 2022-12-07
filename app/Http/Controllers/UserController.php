<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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

        // return Http::dd()->get('http://10.134.30.27/portal/public/user/list/api');

        return view('user.user');
    }

    public function profile()
    {
        $user_details = User::findOrFail(Auth::user()->id);
        return view('user.details', compact(['user_details']));
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
    public function show(Request $request)
    {

        $user_details = User::findOrFail($request->id);
        return view('user.details', compact(['user_details']));
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
    public function update(Request $request)
    {
        $request->validate([

            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'date', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'religion' => ['required', 'string', 'max:255'],
            'civil_status' => ['required', 'string', 'max:255'],
            'educational_attainment' => ['required', 'string', 'max:255'],
            'contact_no' => ['required', 'string', 'min:11', 'max:11'],
            'enrolled' => ['required', 'string', 'max:255'],
            'employment_status' => ['required', 'string', 'max:255'],
            'pwd' => ['required', 'string', 'max:255'],
            'lgbtq' => ['required', 'string', 'max:255'],
            'youth_member' => ['required', 'string', 'max:255'],
            'emergency_contact_name' => ['required', 'string', 'max:255'],
            'emergency_contact_address' => ['required', 'string', 'max:255'],
            'emergency_contact_no' => ['required', 'min:11', 'max:11'],
            'emergency_contact_relationship' => ['required', 'string', 'max:255'],
        ]);


        $user = User::findOrFail($request->user_id);

        $user->last_name = strtoupper($request->last_name);
        $user->first_name = strtoupper($request->first_name);
        $user->middle_name = strtoupper($request->middle_name);
        $user->address = strtoupper($request->address);
        $user->birthday = $request->birthday;
        $user->gender = strtoupper($request->gender);
        $user->religion = strtoupper($request->religion);
        $user->civil_status = strtoupper($request->civil_status);
        $user->educational_attainment = strtoupper($request->educational_attainment);
        $user->contact_no = $request->contact_no;
        $user->enrolled = $request->enrolled;
        $user->employment_status = strtoupper($request->employment_status);
        $user->solo_parent = $request->solo_parent;
        $user->pwd = $request->pwd;
        $user->disability = strtoupper($request->disability);
        $user->youth_member = $request->youth_member;
        $user->youth_org = strtoupper($request->youth_org);
        $user->emergency_contact_name = strtoupper($request->emergency_contact_name);
        $user->emergency_contact_address = strtoupper($request->emergency_contact_address);
        $user->emergency_contact_no = strtoupper($request->emergency_contact_no);
        $user->emergency_contact_relationship = strtoupper($request->emergency_contact_relationship);
        $user->save();

        return redirect()->back()->with('success', $user->full_name . ' has been edited.');
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

    public function list(Request $request)
    {

        if ($request->ajax()) {
            $query = User::select('*');


            return datatables()->eloquent($query)
                ->editColumn('full_name', function (User $user) {
                    $full_name = $user->last_name . ' ' . $user->first_name . ' ' . $user->middle_name;
                    return '<a  class="text-blue-500 font-bold hover:underline" href="' . route('user.details', $user->id) . '" target="_blank"><i class="fa-solid fa-eye"></i> ' . $full_name . '</a>';
                })
                ->rawColumns(['full_name'])
                ->toJson();
        }
    }
}
