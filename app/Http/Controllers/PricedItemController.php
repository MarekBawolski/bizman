<?php

namespace App\Http\Controllers;

use App\Models\PricedItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PricedItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items =  PricedItem::latest('updated_at')->search(request(['search']))->where('user_id', Auth::user()->id)->paginate(15);
        return view('priceditems.index', compact('items'));
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
     * @param  \App\Models\PricedItem  $pricedItem
     * @return \Illuminate\Http\Response
     */
    public function show(PricedItem $pricedItem)
    {
        return view('priceditems.show', [
            'pricedItem' => $pricedItem,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PricedItem  $pricedItem
     * @return \Illuminate\Http\Response
     */
    public function edit(PricedItem $pricedItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PricedItem  $pricedItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PricedItem $pricedItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PricedItem  $pricedItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(PricedItem $pricedItem)
    {
        //
    }
}
