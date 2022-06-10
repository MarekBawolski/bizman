<?php

namespace App\Http\Controllers;

use App\Models\JobType;
use App\Models\QuoteState;
use App\Models\UserSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quote_states = QuoteState::all()->where('user_id', Auth::user()->id);
        $job_types = JobType::all()->where('user_id', Auth::user()->id);
        return view('settings.index', [
            'quote_states' => $quote_states,
            'job_types' => $job_types
        ]);
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
     * @param  \App\Models\UserSetting  $userSetting
     * @return \Illuminate\Http\Response
     */
    public function show(UserSetting $userSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserSetting  $userSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(UserSetting $userSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserSetting  $userSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserSetting $userSetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserSetting  $userSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserSetting $userSetting)
    {
        //
    }
}
