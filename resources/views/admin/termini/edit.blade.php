@extends('layouts.app')

@section('content')
<div class="bg-gray-900 text-white py-16">
    <div class="max-w-3xl mx-auto px-4">
        <h1 class="text-3xl font-bold mb-8">✏️ Izmeni termin</h1>

        <form method="POST" action="{{ route('admin.termini.update', $termin->id) }}" class="space-y-8">
            @csrf
            @method('PUT')

            <div>
                <h2 class="text-xl font-semibold mb-4">🚗 Podaci o vozilu</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block mb-1">Marka</label>
                        <input type="text" name="marka" class="w-full bg-gray-800 border border-gray-600 rounded px-4 py-2"
                            value="{{ $termin->vozilo->marka }}" required>
                    </div>

                    <div>
                        <label class="block mb-1">Model</label>
                        <input type="text" name="model" class="w-full bg-gray-800 border border-gray-600 rounded px-4 py-2"
                            value="{{ $termin->vozilo->model }}" required>
                    </div>

                    <div>
                        <label class="block mb-1">Godište</label>
                        <input type="number" name="godiste" class="w-full bg-gray-800 border border-gray-600 rounded px-4 py-2"
                            value="{{ $termin->vozilo->godiste }}" required>
                    </div>

                    <div>
                        <label class="block mb-1">Vlasnik</label>
                        <input type="text" name="vlasnik" class="w-full bg-gray-800 border border-gray-600 rounded px-4 py-2"
                            value="{{ $termin->vozilo->vlasnik }}">
                    </div>
                </div>
            </div>

            <div>
                <h2 class="text-xl font-semibold mb-4">🕒 Podaci o terminu</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block mb-1">Datum</label>
                        <input type="date" name="datum" class="w-full bg-gray-800 border border-gray-600 rounded px-4 py-2"
                            value="{{ $termin->datum }}" required>
                    </div>

                    <div>
                        <label class="block mb-1">Vreme</label>
                        <input type="time" name="vreme" class="w-full bg-gray-800 border border-gray-600 rounded px-4 py-2"
                            value="{{ $termin->vreme }}" required>
                    </div>
                </div>
            </div>

            <div class="flex space-x-3">
                <button type="submit" class="bg-green-600 hover:bg-green-500 px-6 py-2 rounded text-white">💾 Sačuvaj izmene</button>
                <a href="{{ route('admin.termini.index') }}" class="bg-gray-700 hover:bg-gray-600 px-6 py-2 rounded text-white">← Nazad</a>
            </div>
        </form>
    </div>
</div>
@endsection
