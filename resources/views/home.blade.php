@extends('layouts.app')

@section('content')
{{-- HERO SEKTOR --}}
<div class="bg-[#0D1321] text-[#F0EBD8] py-20">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-4xl font-extrabold mb-4">🚗 Dobrodošli u Mega Auto</h1>
        <p class="text-lg text-gray-300 mb-6">Brza i pouzdana tehnička provera i registracija vozila. Sve na jednom mestu, bez stresa.</p>
        <a href="{{ route('zakazi') }}" class="bg-indigo-600 hover:bg-indigo-500 text-white px-6 py-3 rounded-full font-semibold shadow-lg transition duration-300 hover:scale-105">Zakaži termin</a>

        </a>
    </div>
</div>

{{-- PONUDA MESECA --}}
<div class="bg-[#1D2D44] text-[#F0EBD8] py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-semibold mb-8 flex items-center gap-2">
            <span>🚗</span> Ponuda meseca
        </h2>

        @if($usluge->isEmpty())
            <p class="text-center text-gray-400">Trenutno nema istaknutih usluga.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($usluge as $usluga)
                    <div class="bg-gray-700 rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                        <h3 class="text-xl font-bold mb-2">{{ $usluga->naziv }}</h3>
                        <p class="text-gray-300 mb-4">{{ Str::limit(strip_tags($usluga->opis), 100) }}</p>
                        <div class="flex justify-between items-center">
                            <span class="font-semibold text-indigo-400">{{ number_format($usluga->cena, 2, ',', '.') }} RSD</span>
                            <a href="{{ route('usluge.show', $usluga) }}" class="text-sm text-indigo-300 hover:text-indigo-100 transition">Opširnije →</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
