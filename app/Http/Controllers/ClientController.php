<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients =  Client::latest('updated_at')
            ->search(request(['search']))
            ->where('user_id', Auth::user()->id)
            ->paginate(15);

        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => '',
            'email' => 'unique:clients|email:rfc,dns',
            'address' => 'max:255',
            'city' => 'max:255',
            'company' => 'max:255',
            'tax_id' => 'max:255',
            'company_id' => 'max:255',
            'website' => 'max:255',
            'notes' => 'nullable|string',
        ], [
            'first_name.required' => 'Imię jest wymagane',
            'last_name.required' => 'Nazwisko jest wymagane',
        ]);

        $attributes['user_id'] = auth()->id();

        Client::create($attributes);

        return redirect('/clients');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $Client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('clients.show', [
            'client' => $client,
            'quotes' => $client->quotes
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('clients.edit', [
            'client' => $client
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {

        $attributes = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => '',
            'email' => [Rule::unique('clients', 'email')->ignore($client->id), 'email:rfc,dns'],
            'address' => 'max:255',
            'city' => 'max:255',
            'company' => 'max:255',
            'tax_id' => 'max:255',
            'company_id' => 'max:255',
            'website' => 'max:255',
            'notes' => 'nullable|string',
        ], [
            'first_name.required' => 'Imię jest wymagane',
            'last_name.required' => 'Nazwisko jest wymagane',
        ]);

        $attributes['user_id'] = auth()->id();

        $client->update($attributes);
        return redirect('/clients/' . $client->id)->with('success', 'Klient zaktualizowany');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return back()->with('success', 'Klient ' . $client->first_name . ' ' . $client->last_name . ' został usunięty');
    }
}
