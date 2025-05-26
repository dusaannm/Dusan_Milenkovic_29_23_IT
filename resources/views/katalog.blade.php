@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Katalog vozila</h1>

    <form method="GET" action="{{ route('katalog') }}" class="mb-4">
        <div class="row g-2 align-items-center">
            <div class="col-auto">
                <label for="marka" class="col-form-label">Izaberi marku:</label>
            </div>
            <div class="col-auto">
                <select name="marka" id="marka" class="form-select">
                    <option value="">-- Sve marke --</option>
                    @foreach($sveMarke as $marka)
                        <option value="{{ $marka }}" {{ request('marka') == $marka ? 'selected' : '' }}>
                            {{ $marka }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Filtriraj</button>
            </div>
        </div>
    </form>

    @if($vozila->isEmpty())
        <p class="text-muted">Nema vozila za prikaz.</p>
    @else
        <div class="row">
            @foreach($vozila as $vozilo)
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $vozilo->marka }} {{ $vozilo->model }}</h5>
                            <p class="card-text">
                                Godište: {{ $vozilo->godiste }}<br>
                                Registracija: {{ $vozilo->registracija }}
                            </p>
                            @if($vozilo->featured)
                                <span class="badge bg-success">Ponuda meseca</span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
