<?php

namespace App\Http\Controllers;

use App\Models\JobType;
use App\Models\QuoteState;
use App\Models\User;
use App\Models\UserSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
            'delete.jobtypes.*' => 'required',
            'current_password' => 'nullable|required_with:user_password',
            'user_email' => 'nullable|email',
            'user_password' => 'nullable|min:6|required_with:user_password_confirm',
            'user_password_confirm' => 'nullable|same:user_password|min:6'
        ];
        $messages = [
            'states.*.state.required' => 'Pole jest wymagane',
            'states.*.color.regex' => 'Wymagany format HEX',
            'jobtypes.*.type.required' => 'Pole jest wymagane',
            'jobtypes.*.abbreviation.required' => 'Pole jest wymagane',
            'user_email.email' => 'Niepoprawny adres email',
            'user_password.min' => 'Minimalna długość hasła to 6 znaków',
            'user_password_confirm.min' => 'Minimalna długość hasła to 6 znaków',
            'user_password.required_with' => 'Mddhh',
            'user_password.confirmed' => 'Wpisz hasło dwukrotnie',
            'user_password_confirm.same' => 'Hasła musza być takie same'
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
        if (array_key_exists('user_email', $validated)) {

            $user = Auth::user();
            if ($validated['user_email'] != $user->email) {
                $user->email = $validated['user_email'];
                $user->save();
            }
        }
        if (array_key_exists('user_password', $validated) && array_key_exists('user_password_confirm', $validated)) {

            $user = Auth::user();

            if (!Hash::check($validated['current_password'], $user->password)) {
                return redirect('user/settings')
                    ->withErrors(['current_password' => 'Obecne hasło nie jest poprawne'])
                    ->withInput();
            } else {
                $user->password = Hash::make($request->user_password);
                $user->save();
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
