@extends('layouts.app')

@section('content')
<div class="bg-gray-900 text-white py-20">
    <div class="max-w-4xl mx-auto px-4">
        <h1 class="text-4xl font-bold text-center mb-10">📅 Moji zakazani termini</h1>

        @if($pregledi->isEmpty())
            <p class="text-center text-gray-400">Nemate zakazane termine.</p>
        @else
            <div class="space-y-6">
                @foreach($pregledi as $termin)
                    <div class="bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-xl transition">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-400">Datum</p>
                                <p class="text-lg font-semibold">{{ $termin->datum }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-400">Vreme</p>
                                <p class="text-lg font-semibold">{{ $termin->vreme }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-400">Vozilo</p>
                                <p class="text-lg font-semibold">
                                    {{ $termin->vozilo->marka }} {{ $termin->vozilo->model }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
