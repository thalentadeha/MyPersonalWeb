@extends('layouts.weblayout')

@section('title', 'about')

@section('content')
    <div>
        {{-- <h1>Hai aku sidin</h1> --}}
        <a href="{{ route('test.route1', 'sidin') }}"> <h5>route 1</h5></a>
        <a href="{{ route('test.route2', ['param2' => 'sidin2']) }}"> <h5>route 2</h5></a>
    </div>
@endsection
