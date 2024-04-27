@extends('layouts.main')

@section('title', 'Új karakter')

@section('content')
    <form action="{{ route('characters.store' ) }}" method="POST">
        @csrf

        Név:<br>
        <input type="text" name="name" value="">
        @error('name')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br><br>

        Védelem:<br>
        <input type="number" name="defence" min="0" max="3" value="">
        @error('defence')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br><br>

        Támadás:<br>
        <input type="number" name="strength" min="0" max="20" value="">
        @error('strength')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br><br>

        Pontosság:<br>
        <input type="number" name="accuracy" min="0" max="20" value="">
        @error('accuracy')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br><br>

        Mágia:<br>
        <input type="number" name="magic" min="0" max="20" value="">
        @error('magic')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br><br>

        @error('stats')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br><br>

        <button class="btn btn-success" type="submit">Létrehozás</button>
    </form>
@endsection
