@extends('layouts.main')

@section('title', 'Karaktereim')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <td>Név</td>
                <td>Védelem</td>
                <td>Támadás</td>
                <td>Pontosság</td>
                <td>Mágia</td>
                <td>Részletek</td>
            </tr>
        </thead>
        <tbody>
        @foreach($characters as $c)
            <tr>
                <td>{{ $c->name }}</td>
                <td>{{ $c->defence }}</td>
                <td>{{ $c->strength }}</td>
                <td>{{ $c->accuracy }}</td>
                <td>{{ $c->magic }}</td>
                <td><a href="" class="btn btn-primary">Részletek</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
