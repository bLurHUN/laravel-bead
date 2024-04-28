<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Contest::class);

        $data = $request->all();

        $data['win'] = false;
        $data['history'] = "20e 20h";
        $data['user_id'] = Auth::id();
        $data['place_id'] = Place::all()->random()->id;

        $contest = Contest::create($data);
        Session::flash('contest-created', $contest->name);
        return redirect()->route('contests.show', ['contest' => $contest]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contest $contest)
    {
        return view('contests.show', ['contest' => $contest]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
