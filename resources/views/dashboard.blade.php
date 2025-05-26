@extends('layouts.app')

@section('content')
<div class="bg-gray-900 text-white py-20">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold mb-4">👋 Dobrodošli, {{ Auth::user()->name }}</h1>
        <p class="text-lg text-gray-300">Uspešno ste se prijavili. Ovde možete pratiti vaše termine, zakazati novi pregled ili kontaktirati podršku.</p>
    </div>
</div>
@endsection
