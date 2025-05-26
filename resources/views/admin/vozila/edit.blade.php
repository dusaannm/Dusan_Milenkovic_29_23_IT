@extends('layouts.app')

@section('content')
<div class="bg-gray-900 text-white py-16">
    <div class="max-w-2xl mx-auto px-4">
        <h1 class="text-3xl font-bold mb-8">✏️ Izmeni vozilo</h1>

        <form action="{{ route('admin.vozila.update', $vozilo->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="marka" class="block mb-1 font-medium">Marka</label>
                <input type="text" name="marka" class="w-full bg-gray-800 border border-gray-600 rounded px-4 py-2" value="{{ $vozilo->marka }}" required>
            </div>

            <div>
                <label for="model" class="block mb-1 font-medium">Model</label>
                <input type="text" name="model" class="w-full bg-gray-800 border border-gray-600 rounded px-4 py-2" value="{{ $vozilo->model }}" required>
            </div>

            <div>
                <label for="godiste" class="block mb-1 font-medium">Godište</label>
                <input type="number" name="godiste" class="w-full bg-gray-800 border border-gray-600 rounded px-4 py-2" value="{{ $vozilo->godiste }}" required>
            </div>

            <div>
                <label for="registracija" class="block mb-1 font-medium">Registracija</label>
                <input type="text" name="registracija" class="w-full bg-gray-800 border border-gray-600 rounded px-4 py-2" value="{{ $vozilo->registracija }}" required>
            </div>

            <div class="flex items-center space-x-2">
                <input class="form-checkbox text-indigo-500 bg-gray-800 border-gray-600" type="checkbox" name="featured" id="featured" {{ $vozilo->featured ? 'checked' : '' }}>
                <label class="text-sm" for="featured">Istaknuto (Ponuda meseca)</label>
            </div>

            <div>
                <label for="slika" class="block mb-1 font-medium">Promeni sliku vozila</label>
                <input type="file" name="slika" class="w-full bg-gray-800 border border-gray-600 rounded px-4 py-2">
            </div>

            @if($vozilo->slika)
                <div>
                    <p class="text-sm text-gray-400 mb-1">Trenutna slika:</p>
                    <img src="{{ asset('storage/' . $vozilo->slika) }}" alt="Slika vozila" class="rounded shadow w-32">
                </div>
            @endif

            <div class="flex space-x-3">
                <button type="submit" class="bg-blue-600 hover:bg-blue-500 px-6 py-2 rounded text-white">💾 Ažuriraj</button>
                <a href="{{ route('admin.vozila.index') }}" class="bg-gray-700 hover:bg-gray-600 px-6 py-2 rounded text-white">← Nazad</a>
            </div>
        </form>
    </div>
</div>
@endsection
