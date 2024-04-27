@extends('layouts.main')

@section('title', 'Hely szerkesztése')

@section('content')
    <form action="{{ route('places.update', ['place' => $place ]) }}" method="POST">
        @csrf
        @method('PATCH')

        Név:<br>
        <input type="text" name="name" value="{{ old('name', $place->name) }}">
        @error('name')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br><br>

        Kép:<br>
        <input type="text" name="imgURI" value="{{ old('imgURI', $place->imgURI) }}">
        @error('imgURI')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br><br>

        <button class="btn btn-success" type="submit">Mentés</button>
    </form>
@endsection
