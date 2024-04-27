@extends('layouts.main')

@section('title', 'Főoldal')

@section('content')

<p>Ez egy egy játkos, körökre osztott harcolós játék. Lentebb láthatók az alábbi statisztikák.</p>
<p>Karakterek száma: {{ \App\Models\Character::all()->count() }}</p>
<p>Mérkőzések száma: {{ \App\Models\Contest::all()->count() }}</p>

@endsection
