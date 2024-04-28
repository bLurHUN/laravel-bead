@extends('layouts.main')

@section('title', 'Mérkőzés')

@section('content')
    <p>History: {{ $contest->history }}</p>
@endsection
