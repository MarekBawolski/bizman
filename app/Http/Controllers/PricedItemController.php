<?php

namespace App\Http\Controllers;

use App\Models\JobType;
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
        return view('priceditems.create', [
            'types' => JobType::all()->where('user_id', Auth::user()->id)
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
            'title' => 'required',
            'content' => 'required',
            'work_hours' => 'required',
            'job_type_id' => 'required',
        ], [
            'title.required' => 'Tytuł jest wymagany',
            'content.required' => 'Treść jest wymagana',
            'work_hours.required' => 'Godziny są wymagane',
            'job_type_id.required' => 'Rodzaj prac jest wymagany',
        ]);

        $attributes['user_id'] = auth()->id();

        PricedItem::create($attributes);

        return redirect('/priceditems')->with('success', 'Elemnt dodany');
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
        return view('priceditems.edit', [
            'pricedItem' => $pricedItem,
            'types' => JobType::all()->where('user_id', Auth::user()->id)

        ]);
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
        $attributes = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'work_hours' => 'required',
            'job_type_id' => 'required',
        ], [
            'title.required' => 'Tytuł jest wymagany',
            'content.required' => 'Treść jest wymagana',
            'work_hours.required' => 'Godziny są wymagane',
            'job_type_id.required' => 'Rodzaj prac jest wymagany',
        ]);
        $attributes['user_id'] = auth()->id();

        $pricedItem->update($attributes);
        return redirect('/priceditems/' . $pricedItem->id)->with('success', 'Element zaktualizowany');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PricedItem  $pricedItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(PricedItem $pricedItem)
    {
        $pricedItem->delete();
        return back()->with('success', 'Element ' . $pricedItem->title  . ' został usunięty');
    }
}
