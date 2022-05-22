<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ClientController extends Controller
{
    public function getClients()
    {
        $clients =  Client::latest('updated_at')->where('user_id', Auth::user()->id)->paginate(15);
        return view('clients', compact('clients'));
    }
    public function viewClient(Client $client)
    {
        return view('client', [
            'client' => $client,
            'quotes' => $client->quotes
        ]);
    }
    /**
     * Update the given post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        if (!Gate::allows('update-client', $client)) {
            abort(403);
        }

        // Update the post...
    }
}
