@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $vozilo->marka }} {{ $vozilo->model }}</h1>
    <p>Godište: {{ $vozilo->godiste }}</p>
    <p>Registracija: {{ $vozilo->registracija }}</p>
    <p>Istaknuto: {{ $vozilo->featured ? 'DA' : 'NE' }}</p>
    <a href="{{ route('admin.vozila.index') }}">Nazad</a>
</div>
@endsection
