@extends('layouts.app')

@section('content')
    <div class="">
        <main class="sm:container sm:mx-auto p-5 ">
            <div class="flex">
                <div class="w-full">
                    <section class="flex flex-col break-words bg-white sm:border-1  sm:shadow-sm sm:shadow-lg">

                        <header class="font-semibold bg-slate-700 text-white py-5 px-6 sm:py-6 sm:px-8 ">
                            <i class="fa-solid fa-pen"></i> {{ __('UPDATE') }}
                            <small class="float-right italic">LAST UPDATED AT
                                {{ \Carbon\Carbon::parse($user_details->updated_at)->format('M d, Y') }}
                            </small>
                        </header>

                        @if ($errors->any())
                            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                                role="alert">

                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        @if (session('success'))
                            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                                role="alert">
                                <i class="fa-solid fa-circle-check"></i> <span class="font-medium">
                                    {{ session('success') }}</span>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                                role="alert">
                                <i class="fa-solid fa-xmark"></i> <span class="font-medium">Error !</span>
                                {{ session('error') }}
                            </div>
                        @endif

                        <form class="w-full px-6 py-3 " method="POST" action="{{ route('user.update') }}">
                            @csrf
                            <div class="grid gap-6 mb-6 md:grid-cols-3">
                                {{-- <div>
                                    <div class="flex flex-wrap">
                                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                            {{ __('E-Mail Address') }} <span class="text-red-500">*</span>
                                        </label>

                                        <input id="email" type="email"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('email')  @enderror"
                                            name="email" value="{{ $user_details->email }}" required autocomplete="email"
                                            autofocus>

                                        @error('email')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div> --}}


                                <input type="hidden" value="{{ $user_details->id }}" name="user_id">
                                <div>
                                    <label for="last_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" id="last_name" name="last_name"
                                        value="{{ $user_details->last_name }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="" required>
                                </div>
                                <div>
                                    <label for="first_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name
                                        <span class="text-red-500">*</span></label>
                                    <input type="text" id="first_name" name="first_name"
                                        value="{{ $user_details->first_name }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="" required>
                                </div>

                                <div>
                                    <label for="middle_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Middle
                                        Name</label>
                                    <input type="text" id="middle_name" name="middle_name"
                                        value="{{ $user_details->middle_name }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Ex. Glero, Dominguez, Santos, etc. (Kumpletuhin)">
                                </div>

                                <div>
                                    <label for="address"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" id="address" name="address"
                                        value="{{ $user_details->address }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Full Address" required>
                                </div>
                                <div>
                                    <label for="birthday"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birthday <span
                                            class="text-red-500">*</span> <span id="age"></span></label>
                                    <input type="date" id="birthday" name="birthday"
                                        value="{{ $user_details->birthday }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required>
                                </div>


                                <div>
                                    <label for="religion"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender <span
                                            class="text-red-500">*</span>
                                    </label>
                                    <ul
                                        class="items-center w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                        <li
                                            class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                            <div class="flex items-center pl-3">

                                                <input id="male" type="radio" value="MALE" name="gender"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                    required {{ $user_details->gender == 'MALE' ? 'checked' : '' }}>

                                                <label for="male"
                                                    class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Male
                                                </label>
                                            </div>
                                        </li>
                                        <li
                                            class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                            <div class="flex items-center pl-3">
                                                <input id="female" type="radio" value="FEMALE" name="gender"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                    required {{ $user_details->gender == 'FEMALE' ? 'checked' : '' }}>
                                                <label for="female"
                                                    class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Female
                                                </label>
                                            </div>
                                        </li>

                                    </ul>
                                </div>

                                <div>
                                    <label for="religion"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Religion <span
                                            class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="religion" name="religion"
                                        value="{{ $user_details->religion }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="ex. Catholic, Islam, " required>
                                </div>

                                <div>
                                    <label for="religion"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Civil Status
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <ul
                                        class="items-center w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                        <li
                                            class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                            <div class="flex items-center pl-3">
                                                <input id="single" type="radio" value="single" name="civil_status"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                    {{ $user_details->civil_status == 'SINGLE' ? 'checked' : '' }}>
                                                <label for="single"
                                                    class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Single
                                                </label>
                                            </div>
                                        </li>
                                        <li
                                            class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                            <div class="flex items-center pl-3">
                                                <input id="married" type="radio" value="married" name="civil_status"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                    {{ $user_details->civil_status == 'MARRIED' ? 'checked' : '' }}>
                                                <label for="married"
                                                    class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Married
                                                </label>
                                            </div>
                                        </li>
                                        <li
                                            class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                            <div class="flex items-center pl-3">
                                                <input id="live_in" type="radio" value="Live In" name="civil_status"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                    {{ $user_details->civil_status == 'LIVE IN' ? 'checked' : '' }}>
                                                <label for="live_in"
                                                    class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Live
                                                    In
                                                </label>
                                            </div>
                                        </li>
                                        <li class="w-full dark:border-gray-600">
                                            <div class="flex items-center pl-3">
                                                <input id="other" type="radio" value="Other" name="civil_status"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                    {{ $user_details->civil_status == 'OTHER' ? 'checked' : '' }}>
                                                <label for="other"
                                                    class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Other
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div>

                                    <label for="educational_attainment"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Educational
                                        Attainment <br><small>(Undergraduate kung ikaw ay hindi nakapagtapos ng
                                            pagaaral) <span class="text-red-500">*</span></small></label>
                                    <select id="educational_attainment" name="educational_attainment"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                        <option selected value="{{ $user_details->educational_attainment }}">
                                            {{ $user_details->educational_attainment }}</option>

                                        <option value="Elementary Graduate">Elementary Graduate</option>
                                        <option value="High School Undergraduate">High School Undergraduate</option>
                                        <option value="High School Graduate">High School Graduate</option>
                                        <option value="College Undergraduate">College Undergraduate</option>
                                        <option value="College Graduate Bachelor's Degree">College Graduate Bachelor's
                                            Degree
                                        </option>
                                        <option value="Associate Degree">Associate Degree</option>
                                        <option value="Master's Degree">Master's Degree</option>
                                        <option value="Vocational Certificate">Vocational Certificate</option>

                                    </select>

                                </div>

                                <div>
                                    <label for="contac_no"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact
                                        Number (09) <span class="text-red-500">*</span></label>
                                    <input type="text" id="contact_no" name="contact_no"
                                        value="{{ $user_details->contact_no }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="11 digits" maxlength="11"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                        required>
                                </div>
                                <div>
                                    <label for="religion"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Are you
                                        currently
                                        enrolled? <span class="text-red-500">*</span>
                                    </label>
                                    <ul
                                        class="items-center w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                        <li
                                            class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                            <div class="flex items-center pl-3">
                                                <input id="yes" type="radio" value="YES" name="enrolled"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                    {{ $user_details->enrolled == 'YES' ? 'checked' : '' }}>
                                                <label for="yes"
                                                    class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Yes
                                                </label>
                                            </div>
                                        </li>
                                        <li
                                            class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                            <div class="flex items-center pl-3">
                                                <input id="no" type="radio" value="NO" name="enrolled"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                    {{ $user_details->enrolled == 'NO' ? 'checked' : '' }}>
                                                <label for="no"
                                                    class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">No
                                                </label>
                                            </div>
                                        </li>

                                    </ul>
                                </div>

                                <div class="">
                                    <label for="religion"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Employement
                                        Status
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <ul
                                        class="py-2 w-48 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                        <li
                                            class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                            <div class="flex items-center pl-3">
                                                <input id="student" type="radio" value="Student"
                                                    name="employment_status"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                    {{ $user_details->employment_status == 'STUDENT' ? 'checked' : '' }}>
                                                <label for="student"
                                                    class="ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Student
                                                </label>
                                            </div>
                                        </li>
                                        <li
                                            class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                            <div class="flex items-center pl-3">
                                                <input id="unemployed" type="radio" value="Unemployed"
                                                    name="employment_status"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                    {{ $user_details->employment_status == 'UNEMPLOYED' ? 'checked' : '' }}>
                                                <label for="unemployed"
                                                    class=" ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Unemployed
                                                </label>
                                            </div>
                                        </li>
                                        <li
                                            class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                            <div class="flex items-center pl-3">
                                                <input id="employed" type="radio" value="Employed"
                                                    name="employment_status"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                    {{ $user_details->employment_status == 'EMPLOYED' ? 'checked' : '' }}>
                                                <label for="employed"
                                                    class=" ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Employed

                                                </label>
                                            </div>
                                        </li>
                                        <li class="w-full dark:border-gray-600">
                                            <div class="flex items-center pl-3">
                                                <input id="employed_wfh" type="radio" value="Employed (Work From Home)"
                                                    name="employment_status"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                    {{ $user_details->employment_status == 'EMPLOYED (WORK FROM HOME)' ? 'checked' : '' }}>
                                                <label for="employed_wfh"
                                                    class=" ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Employed
                                                    (Work From Home)
                                                </label>
                                            </div>
                                        </li>

                                        <li class="w-full dark:border-gray-600">
                                            <div class="flex items-center pl-3">
                                                <input id="self_employed" type="radio" value="Self Employed"
                                                    name="employment_status"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                    {{ $user_details->employment_status == 'SELF EMPLOYED' ? 'checked' : '' }}>
                                                <label for="self_employed"
                                                    class=" ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Self
                                                    Employed
                                                </label>
                                            </div>
                                        </li>
                                        <li class="w-full dark:border-gray-600">
                                            <div class="flex items-center pl-3">
                                                <input id="working_student" type="radio" value="Working Student"
                                                    name="employment_status"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                    {{ $user_details->employment_status == 'WORKING STUDENT' ? 'checked' : '' }}>
                                                <label for="working_student"
                                                    class=" ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Working
                                                    Student
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div>
                                    <label for="religion"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Are you part
                                        of
                                        the <span class="text-green-700 font-bold">SOLO PARENT COMMUNITY?</span>
                                    </label>
                                    <ul
                                        class="items-center w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                        <li
                                            class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                            <div class="flex items-center pl-3">
                                                <input id="solo_parent_yes" type="radio" value="YES"
                                                    name="solo_parent"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                    {{ $user_details->solo_parent == 'YES' ? 'checked' : '' }}>
                                                <label for="solo_parent_yes"
                                                    class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Yes
                                                </label>
                                            </div>
                                        </li>
                                        <li
                                            class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                            <div class="flex items-center pl-3">
                                                <input id="solo_parent_no" type="radio" value="NO"
                                                    name="solo_parent"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                    {{ $user_details->solo_parent == 'NO' ? 'checked' : '' }}>
                                                <label for="solo_parent_no"
                                                    class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">No
                                                </label>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                                <div>
                                    <label for="religion"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Are you a
                                        person
                                        with disability? (PWD) <span class="text-red-500">*</span>
                                    </label>
                                    <ul
                                        class="items-center w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                        <li
                                            class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                            <div class="flex items-center pl-3">
                                                <input id="pwd_yes" type="radio" value="YES" name="pwd"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                    {{ $user_details->pwd == 'YES' ? 'checked' : '' }}>
                                                <label for="pwd_yes"
                                                    class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Yes
                                                </label>
                                            </div>
                                        </li>
                                        <li
                                            class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                            <div class="flex items-center pl-3">
                                                <input id="pwd_no" type="radio" value="NO" name="pwd"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                    {{ $user_details->pwd == 'NO' ? 'checked' : '' }}>
                                                <label for="pwd_no"
                                                    class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">No
                                                </label>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                                <div class="mb-6">
                                    <label for="disability"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">If Yes, What
                                        type
                                        of disability?
                                        If No, please skip this question.
                                    </label>
                                    <input type="text" id="disability" name="disability"
                                        value="{{ $user_details->disability }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="State your disability">
                                </div>
                                <div>
                                    <label for="religion"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Are you a part
                                        of
                                        the LGBTQ+ COMMUNITY? <span class="text-red-500">*</span>
                                    </label>
                                    <ul
                                        class="items-center w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                        <li
                                            class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                            <div class="flex items-center pl-3">
                                                <input id="lgbtq_yes" type="radio" value="YES" name="lgbtq"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                    {{ $user_details->lgbtq == 'YES' ? 'checked' : '' }}>
                                                <label for="lgbtq_yes"
                                                    class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Yes
                                                </label>
                                            </div>
                                        </li>
                                        <li
                                            class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                            <div class="flex items-center pl-3">
                                                <input id="lgbtq_no" type="radio" value="NO" name="lgbtq"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                    {{ $user_details->lgbtq == 'NO' ? 'checked' : '' }}>
                                                <label for="lgbtq_no"
                                                    class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">No
                                                </label>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                                <div>
                                    <label for="religion"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Are you a
                                        member
                                        of a Youth Organization? <span class="text-red-500">*</span>
                                    </label>
                                    <ul
                                        class="items-center w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                        <li
                                            class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                            <div class="flex items-center pl-3">
                                                <input id="youth_member_yes" type="radio" value="YES"
                                                    name="youth_member"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                    {{ $user_details->youth_member == 'YES' ? 'checked' : '' }}>
                                                <label for="youth_member_yes"
                                                    class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Yes
                                                </label>
                                            </div>
                                        </li>
                                        <li
                                            class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                            <div class="flex items-center pl-3">
                                                <input id="youth_member_no" type="radio" value="NO"
                                                    name="youth_member"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                    {{ $user_details->youth_member == 'NO' ? 'checked' : '' }}>
                                                <label for="youth_member_no"
                                                    class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">No
                                                </label>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                                <div class="mb-6">
                                    <label for="youth_org"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">If Yes, What
                                        is
                                        the name of your Organization?
                                        Please indicate your position below
                                        If No, please skip this question.
                                    </label>
                                    <input type="text" id="youth_org" name="youth_org"
                                        value="{{ $user_details->youth_org }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Ex. Pasacola A Youth Club - Member">
                                </div>


                            </div>
                            <hr><br>
                            <h3 class="font-bold text-orange-500 py-3">Emergency Contact</h3>
                            <div class="mb-6">
                                <label for="emergency_contact_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Name <span
                                        class="text-red-500">*</span>

                                </label>
                                <input type="text" id="emergency_contact_name" name="emergency_contact_name"
                                    value="{{ $user_details->emergency_contact_name }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Ex. Andrea May C. Liganon">
                            </div>

                            <div class="mb-6">
                                <label for="emergency_contact_address"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Address <span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="emergency_contact_address" name="emergency_contact_address"
                                    value="{{ $user_details->emergency_contact_address }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Full Address" required>
                            </div>

                            <div class="mb-6">
                                <label for="emergency_contact_no"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact
                                    Number (09) <span class="text-red-500">*</span></label>
                                <input type="text" id="emergency_contact_no" name="emergency_contact_no"
                                    value="{{ $user_details->emergency_contact_no }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="11 digits" maxlength="11"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    required>
                            </div>
                            <div class="mb-6">
                                <label for="emergency_contact_relationship"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Relationship with
                                    the
                                    contact person? (Kaano-ano mo ang nilagay na pangalan?) <span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="emergency_contact_relationship"
                                    name="emergency_contact_relationship"
                                    value="{{ $user_details->emergency_contact_relationship }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="" required>
                            </div>

                            <div class="flex flex-wrap py-3">
                                <button type="submit"
                                    class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-[#1746A2] hover:bg-blue-700 sm:py-4">
                                    <i class="fa-solid fa-floppy-disk"></i> {{ __('SAVE') }}
                                </button>

                            </div>
                        </form>

                    </section>
                </div>
            </div>
        </main>
    </div>
    <script>
        $(document).ready(function() {
            $('.user-nav').removeClass('text-gray-700');
            $('.profile-nav').removeClass('text-gray-700');
            $('.user-nav').addClass('text-blue-500');
            $('.profile-nav').addClass('text-blue-500');
        });
    </script>
@endsection
