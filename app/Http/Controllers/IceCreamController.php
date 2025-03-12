<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IceCream;

class IceCreamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $iceCreams = IceCream::all();
        return view('icecreams.index', compact('iceCreams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('icecreams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(IceCream::rules());

        IceCream::create($request->all());

        return redirect()->route('icecreams.index')->with('success', 'Ice Cream added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('icecreams.show', compact('iceCream'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('icecreams.edit', compact('iceCream'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(IceCream::rules());

        $iceCream->update($request->all());

        return redirect()->route('icecreams.index')->with('success', 'Ice Cream updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $iceCream->delete();

        return redirect()->route('icecreams.index')->with('success', 'Ice Cream deleted successfully!');
    }
}
