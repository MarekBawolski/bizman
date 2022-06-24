<?php

namespace App\Http\Controllers;

use App\Models\JobType;
use App\Models\QuoteState;
use App\Models\UserSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
    public function edit(Request $request, UserSetting $userSetting)
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
        $rules =  [
            'states.*.state' => 'required',
            'states.*.color' =>  'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/',
            'jobtypes.*.type' => 'required',
            'jobtypes.*.abbreviation' => 'required',
            'jobtypes.*.id' => 'nullable',
            'states.*.id' => 'nullable',
            'delete.states.*' => 'required',
            'delete.jobtypes.*' => 'required'
        ];
        $messages = [
            'states.*.state.required' => 'Pole jest wymagane',
            'states.*.color.regex' => 'Wymagany format HEX',
            'jobtypes.*.type.required' => 'Pole jest wymagane',
            'jobtypes.*.abbreviation.required' => 'Pole jest wymagane',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect('user/settings')
                ->withErrors($validator)
                ->withInput();
        }
        $validated = $validator->validated();
        if (array_key_exists('states', $validated)) {

            foreach ($validated['states'] as $key => $data) {

                $data['user_id'] = auth()->id();
                $quoteState = QuoteState::updateOrCreate(
                    ['id' => array_key_exists('id', $data) ? (int)$data['id'] : false],
                    $data
                );
            }
        }
        if (array_key_exists('jobtypes', $validated)) {

            foreach ($validated['jobtypes'] as $key => $data) {
                $data['user_id'] = auth()->id();
                $jobType = JobType::updateOrCreate(
                    ['id' => array_key_exists('id', $data) ? (int)$data['id'] : false],
                    $data
                );
            }
        }

        if (array_key_exists('delete', $validated)) {
            if (array_key_exists('states', $validated['delete'])) {
                foreach ($validated['delete']['states'] as $stateId) {
                    $deletedRows = QuoteState::where('user_id', auth()->id())->where('id', (int)$stateId)->delete();
                }
            }

            if (array_key_exists('jobtypes', $validated['delete'])) {
                foreach ($validated['delete']['jobtypes'] as $jobTypeId) {
                    $deletedRows = JobType::where('user_id', auth()->id())->where('id', (int)$jobTypeId)->delete();
                }
            }
        }

        return redirect('/user/settings/')->with('success', 'Ustawienia zaktualizowane');
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
