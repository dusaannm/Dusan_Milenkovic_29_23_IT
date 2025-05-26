@extends('layouts.app')

@section('content')
<div class="bg-gray-900 text-white py-16">
    <div class="max-w-2xl mx-auto px-4">
        <h1 class="text-3xl font-bold mb-8">➕ Dodaj novo vozilo</h1>

        <form action="{{ route('admin.vozila.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="marka" class="block mb-1 font-medium">Marka</label>
                <input type="text" name="marka" class="w-full bg-gray-800 border border-gray-600 rounded px-4 py-2" required>
            </div>

            <div>
                <label for="model" class="block mb-1 font-medium">Model</label>
                <input type="text" name="model" class="w-full bg-gray-800 border border-gray-600 rounded px-4 py-2" required>
            </div>

            <div>
                <label for="godiste" class="block mb-1 font-medium">Godište</label>
                <input type="number" name="godiste" class="w-full bg-gray-800 border border-gray-600 rounded px-4 py-2" required>
            </div>

            <div>
                <label for="registracija" class="block mb-1 font-medium">Registracija</label>
                <input type="text" name="registracija" class="w-full bg-gray-800 border border-gray-600 rounded px-4 py-2" required>
            </div>

            <div class="flex items-center space-x-2">
                <input type="checkbox" name="featured" id="featured" class="form-checkbox text-indigo-500 bg-gray-800 border-gray-600">
                <label for="featured" class="text-sm">Istaknuto (Ponuda meseca)</label>
            </div>

            <div>
                <label for="slika" class="block mb-1 font-medium">Slika vozila</label>
                <input type="file" name="slika" class="w-full bg-gray-800 border border-gray-600 rounded px-4 py-2">
            </div>

            <div class="flex space-x-3">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 px-6 py-2 rounded text-white">💾 Sačuvaj</button>
                <a href="{{ route('admin.vozila.index') }}" class="bg-gray-700 hover:bg-gray-600 px-6 py-2 rounded text-white">← Nazad</a>
            </div>
        </form>
    </div>
</div>
@endsection
