@extends('layouts.main')

@section('title', 'Karakter szerkesztése')

@section('content')

    <form action="{{ route('characters.update', ['character' => $character ]) }}" method="POST">
        @csrf
        @method('PATCH')

        Név:<br>
        <input type="text" name="name" value="{{ old('name', $character->name) }}">
        @error('name')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br><br>

        Védelem:<br>
        <input type="number" name="defence" min="0" max="3" value="{{ old('defence', $character->defence) }}">
        @error('defence')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br><br>

        Támadás:<br>
        <input type="number" name="strength" min="0" max="20" value="{{ old('strength', $character->strength) }}">
        @error('strength')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br><br>

        Pontosság:<br>
        <input type="number" name="accuracy" min="0" max="20" value="{{ old('accuracy', $character->accuracy) }}">
        @error('accuracy')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br><br>

        Mágia:<br>
        <input type="number" name="magic" min="0" max="20" value="{{ old('magic', $character->magic) }}">
        @error('magic')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br><br>

        @error('stats')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br><br>

        <button class="btn btn-success" type="submit">Mentés</button>
    </form>

@endsection
