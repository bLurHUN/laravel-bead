@extends('layouts.main')

@section('title', 'Helyszínek')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <td>Név</td>
                <td>Kép</td>
                <td>Szerkesztés</td>
                <td>Törlés</td>
            </tr>
        </thead>
        <tbody>
        @foreach($places as $p)
            <tr>
                <td>{{ $p->name }}</td>
                <td><img src="{{ $p->imgURI }}" alt=""></td>
                <td><a class="btn btn-warning" href="{{ route('places.edit', ['place' => $p]) }}">Szerkesztés</a></td>
                <td>
                    <form action="{{ route('places.destroy', ['place' => $p]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="#" class="btn btn-danger" onclick="this.closest('form').submit()">Törlés</a>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
