@extends('layouts.app')

@section('content')
<div class="bg-gray-900 text-white py-20">
    <div class="max-w-3xl mx-auto px-4">
        <h1 class="text-4xl font-bold mb-6">{{ $usluga->naziv }}</h1>

        <div class="bg-gray-800 p-6 rounded-xl shadow-md space-y-6">
            <div class="text-gray-300 text-lg leading-relaxed">
                {!! $usluga->opis !!}
            </div>

            <div class="flex justify-between items-center mt-6">
                <span class="text-2xl font-bold text-indigo-400">
                    {{ number_format($usluga->cena, 2, ',', '.') }} RSD
                </span>

                <a href="{{ route('zakazi') }}" class="bg-indigo-600 hover:bg-indigo-500 text-white px-5 py-2 rounded-md font-medium transition">
                    Zakaži termin
                </a>
            </div>
        </div>

        <div class="mt-8">
            <a href="{{ route('home') }}" class="text-sm text-indigo-300 hover:text-indigo-100">&larr; Nazad na početnu</a>
        </div>
    </div>
</div>
@endsection
