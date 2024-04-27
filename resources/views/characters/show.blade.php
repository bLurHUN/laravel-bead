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
            <a href=""><li>Helyszín: {{ $c->place->name }} - Ellenség: {{ $c->characters->where('enemy', '=', true)->first()->name }}</li></a>
        @endforeach
    </ul>

    @can ('update', $character)
        <a class="btn btn-primary mb-1" href="{{ route('characters.edit', ['character' => $character ]) }}">Szerkesztés</a>
    @endcan

    @can ('delete', $character)
        <form action="{{ route('characters.destroy', ['character' => $character])}}" method="POST">
            @csrf
            @method('DELETE')
            <a href="#" class="btn btn-danger" onclick="this.closest('form').submit()">Törlés</a>
        </form>
    @endcan

@endsection
