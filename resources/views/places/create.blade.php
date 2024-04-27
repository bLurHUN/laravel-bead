@extends('layouts.main')

@section('title', 'Új helyszín')

@section('content')
    <form action="{{ route('places.store') }}" method="POST">
        @csrf

        Név:<br>
        <input type="text" name="name" value="">
        @error('name')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br><br>

        Kép URL:<br>
        <input type="text" name="imgURI" value="">
        @error('defence')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br><br>

        <button class="btn btn-success" type="submit">Létrehozás</button>
    </form>
@endsection
