<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::user()->admin) {
            return redirect('/');
        }
        $places = Place::all();
        return view('places.index', ['places' => $places]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->admin) {
            return redirect('/');
        }
        $this->authorize('create', Place::class);

        return view('places.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Place::class);

        $validated = $request->validate([
            'name' => 'required',
            'imgURI' => 'required',
        ], [
            'name.required' => 'Adj meg egy nevet!',
            'imgURI.required' => 'Add meg a kép URl-ét!',
        ]);

        $place = Place::create($validated);
        Session::flash('place-created', $place->name);
        return redirect()->route('places.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Place $place)
    {
        if (!Auth::user()->admin) {
            return redirect('/');
        }
        $this->authorize('update', Place::class);

        return view('places.edit', [
            'place' => $place
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Place $place)
    {
        $this->authorize('update', Place::class);

        $validated = $request->validate([
            'name' => 'required',
            'imgURI' => 'required',
        ], [
            'name.required' => 'Adj meg egy nevet!',
            'imgURI.required' => 'Add meg a kép URl-ét!',
        ]);

        $place->update($validated);
        Session::flash('place-updated', $place->name);
        return redirect()->route('places.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Place $place)
    {
        $this->authorize('delete', Place::class);

        $place->delete();
        return redirect()->route('places.index');
    }
}
