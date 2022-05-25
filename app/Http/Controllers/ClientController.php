<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    public function index()
    {
        $clients =  Client::latest('updated_at')->where('user_id', Auth::user()->id)->paginate(15);
        return view('clients.index', compact('clients'));
    }
    public function show(Client $client)
    {
        return view('clients.show', [
            'client' => $client,
            'quotes' => $client->quotes
        ]);
    }
    public function create()
    {
        return view('clients.create', []);
    }
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
        ]);

        $attributes['user_id'] = auth()->id();

        Client::create($attributes);

        return redirect('/clients');
    }
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
        ]);

        $attributes['user_id'] = auth()->id();

        $client->update($attributes);

        return back()->with('success', 'Klient zaktualizowany');
    }
    public function destroy(Client $client)
    {
        $client->delete();
        return back()->with('success', 'Klient ' . $client->first_name . ' ' . $client->last_name . ' został usunięty');
    }
    public function edit(Client $client)
    {
        return view('clients.edit', [
            'client' => $client
        ]);
    }
}
