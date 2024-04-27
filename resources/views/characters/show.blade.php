@extends('layouts.main')

@section('title', $character->name)

@section('content')
    <h2>Adatok</h2>
    <p>Név: {{ $character->name }} </p>
    <p>Védelem: {{ $character->defence }} </p>
    <p>Támadás: {{ $character->strength }} </p>
    <p>Pontosság: {{ $character->accuracy }} </p>
    <p>Mágia: {{ $character->magic }} </p>
    <h2>Mérkőzések</h2>
    <ul>
        @foreach($character->contests as $c)
            <li>Helyszín: {{ $c->place->name }} - Ellenség: {{ $c->characters->where('enemy', '=', true)->first()->name }}</li>
        @endforeach
    </ul>
@endsection
