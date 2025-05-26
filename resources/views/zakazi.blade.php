@extends('layouts.app')

@section('content')
<div class="bg-gray-900 text-white py-20">
    <div class="max-w-3xl mx-auto px-4">
        <h1 class="text-4xl font-bold text-center mb-10">🛠️ Zakazivanje tehničkog pregleda</h1>

        @if(session('success'))
            <div class="bg-green-600 text-white text-center py-3 px-4 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('zakazi.store') }}" class="bg-gray-800 p-8 rounded-xl shadow-md space-y-8">
            @csrf

            <div>
                <h2 class="text-xl font-semibold mb-4">👤 Podaci o vlasniku</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium mb-1">Ime</label>
                        <input type="text" name="ime" class="w-full p-2 bg-gray-700 border border-gray-600 rounded text-white" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Prezime</label>
                        <input type="text" name="prezime" class="w-full p-2 bg-gray-700 border border-gray-600 rounded text-white" required>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium mb-1">Email adresa</label>
                        <input type="email" name="email" class="w-full p-2 bg-gray-700 border border-gray-600 rounded text-white" required>
                    </div>
                </div>
            </div>

            <div>
                <h2 class="text-xl font-semibold mb-4">🚗 Podaci o vozilu</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium mb-1">Marka</label>
                        <input type="text" name="marka" class="w-full p-2 bg-gray-700 border border-gray-600 rounded text-white" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Model</label>
                        <input type="text" name="model" class="w-full p-2 bg-gray-700 border border-gray-600 rounded text-white" required>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium mb-1">Godište</label>
                        <input type="number" name="godiste" class="w-full p-2 bg-gray-700 border border-gray-600 rounded text-white" required>
                    </div>
                </div>
            </div>

            <div>
                <h2 class="text-xl font-semibold mb-4">🗓️ Izaberi termin</h2>

                <label class="block text-sm font-medium mb-1">Datum i vreme</label>
                <select name="datum" class="w-full p-2 bg-gray-700 border border-gray-600 rounded text-white" required>
                    <option value="">-- Izaberi termin --</option>
                    @foreach($termini as $t)
                        <option value="{{ $t['datum'] }}|{{ $t['vreme'] }}">
                            {{ $t['datum'] }} u {{ substr($t['vreme'], 0, 5) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white py-3 rounded-md font-semibold transition">
                ✅ Zakaži pregled
            </button>
        </form>
    </div>
</div>
@endsection
