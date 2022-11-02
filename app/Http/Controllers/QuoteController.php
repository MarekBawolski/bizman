<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\JobType;
use App\Models\PricedItem;
use App\Models\Quote;
use App\Models\QuoteState;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotes =  Quote::latest('updated_at')->where('user_id', Auth::user()->id)->paginate(15);
        return view('quotes.index', compact('quotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_clients = Client::all()->where('user_id', Auth::user()->id);
        $quote_states = QuoteState::all()->where('user_id', Auth::user()->id);
        $priced_items = PricedItem::all()->where('user_id', Auth::user()->id);
        $job_types = JobType::all()->where('user_id', Auth::user()->id);

        return view('quotes.create', [
            'clients' => $user_clients,
            'states' => $quote_states,
            'priced_items' => $priced_items,
            'job_types' => $job_types
        ]);
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
            'client_id' => 'required',
            'state_id' => 'required',
            'name' => 'required',
            'quote_elements' => 'required',
            'calculate' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['quote_elements'] = json_encode(array_map('intval', $attributes['quote_elements']));

        // TODO
        // create new priced items  - needs another pseudo multi select

        Quote::create($attributes);

        return redirect('/quotes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function show(Quote $quote)
    {
        return view('quotes.show', [
            'quote' => $quote,
            'jobtypes' => JobType::all()->where('user_id', Auth::user()->id)
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function edit(Quote $quote)
    {
        $results = PricedItem::where('user_id', Auth::user()->id)->paginate(10);
        $job_types = JobType::all()->where('user_id', Auth::user()->id);
        return view('quotes.edit', [
            'quote' => $quote,
            'selected' => $quote->pricedItems,
            'items' => $results,
            'job_types' => $job_types
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quote $quote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quote $quote)
    {
        $quote->delete();
        return back()->with('success', 'Wycena ' . $quote->name  . ' została usunięta');
    }
}
