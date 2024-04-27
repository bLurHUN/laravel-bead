<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $characters = User::findOrFail(Auth::id())->characters;
        return view('characters.index', ['characters' => $characters]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Character::class);

        return view('characters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Character::class);

        $d = $request->get('defence');
        $s = $request->get('strength');
        $a = $request->get('accuracy');
        $m = $request->get('magic');
        $stats = $d + $s + $a + $m;

        $request->merge(['stats' => $stats]);

        $validated = $request->validate([
            'name' => 'required',
            'defence' => 'required|numeric|min:0|max:3',
            'strength' => 'required|numeric|min:0|max:20',
            'accuracy' => 'required|numeric|min:0|max:20',
            'magic' => 'required|numeric|min:0|max:20',
            'stats' => 'numeric|min:20|max:20',
        ], [
            'name.required' => 'Adj meg egy nevet!',
            'defence.required' => 'Add meg a védelem értékét!',
            'defence.numeric' => 'A védelemnek számnak kell lennie!',
            'defence.min' => 'A védelemnek minimum :min-nek kell lennie!',
            'defence.max' => 'A védelem maximum :max lehet!',
            'strength.required' => 'Add meg a támadás értékét!',
            'strength.numeric' => 'A támadásnak számnak kell lennie!',
            'strength.min' => 'A támadásnak minimum :min-nek kell lennie!',
            'strength.max' => 'A támadás maximum :max lehet!',
            'accuracy.required' => 'Add meg a pontosság értékét!',
            'accuracy.numeric' => 'A pontosságnak számnak kell lennie!',
            'accuracy.min' => 'A pontosságnak minimum :min-nek kell lennie!',
            'accuracy.max' => 'A pontosság maximum :max lehet!',
            'magic.required' => 'Add meg a mágia értékét!',
            'magic.numeric' => 'A mágiának számnak kell lennie!',
            'magic.min' => 'A mágiának minimum :min-nek kell lennie!',
            'magic.max' => 'A mágia maximum :max lehet!',
            'stats.min' => 'A statok összegének 20-nak kell lennie!',
            'stats.max' => 'A statok összegének 20-nak kell lennie!',
        ]);

        $validated['user_id'] = Auth::id();
        $character = Character::create($validated);
        Session::flash('character-created', $character->name);
        return redirect()->route('characters.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Character $character)
    {
        return view('characters.show', ['character' => $character]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Character $character)
    {
        $this->authorize('update', $character);

        return view('characters.edit', [
            'character' => $character
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Character $character)
    {
        $this->authorize('update', $character);

        $d = $request->get('defence');
        $s = $request->get('strength');
        $a = $request->get('accuracy');
        $m = $request->get('magic');
        $stats = $d + $s + $a + $m;

        $request->merge(['stats' => $stats]);

        $validated = $request->validate([
            'name' => 'required',
            'defence' => 'required|numeric|min:0|max:3',
            'strength' => 'required|numeric|min:0|max:20',
            'accuracy' => 'required|numeric|min:0|max:20',
            'magic' => 'required|numeric|min:0|max:20',
            'stats' => 'numeric|min:20|max:20',
        ], [
            'name.required' => 'Adj meg egy nevet!',
            'defence.required' => 'Add meg a védelem értékét!',
            'defence.numeric' => 'A védelemnek számnak kell lennie!',
            'defence.min' => 'A védelemnek minimum :min-nek kell lennie!',
            'defence.max' => 'A védelem maximum :max lehet!',
            'strength.required' => 'Add meg a támadás értékét!',
            'strength.numeric' => 'A támadásnak számnak kell lennie!',
            'strength.min' => 'A támadásnak minimum :min-nek kell lennie!',
            'strength.max' => 'A támadás maximum :max lehet!',
            'accuracy.required' => 'Add meg a pontosság értékét!',
            'accuracy.numeric' => 'A pontosságnak számnak kell lennie!',
            'accuracy.min' => 'A pontosságnak minimum :min-nek kell lennie!',
            'accuracy.max' => 'A pontosság maximum :max lehet!',
            'magic.required' => 'Add meg a mágia értékét!',
            'magic.numeric' => 'A mágiának számnak kell lennie!',
            'magic.min' => 'A mágiának minimum :min-nek kell lennie!',
            'magic.max' => 'A mágia maximum :max lehet!',
            'stats.min' => 'A statok összegének 20-nak kell lennie!',
            'stats.max' => 'A statok összegének 20-nak kell lennie!',
        ]);

        $character->update($validated);
        Session::flash('character-updated', $character->name);
        return redirect()->route('characters.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character)
    {
        $this -> authorize('delete', $character);

        $character->delete();
        return redirect()->route('characters.index');
    }
}
