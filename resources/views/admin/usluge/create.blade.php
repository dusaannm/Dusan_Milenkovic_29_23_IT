@extends('layouts.app')

@section('content')
<div class="bg-gray-900 text-white py-16">
    <div class="max-w-2xl mx-auto px-4">
        <h1 class="text-3xl font-bold mb-8">➕ Dodaj novu uslugu</h1>

        <form method="POST" action="{{ route('admin.usluge.store') }}" class="space-y-6">
            @csrf

            <div>
                <label for="naziv" class="block mb-1 font-medium">Naziv</label>
                <input type="text" name="naziv" class="w-full bg-gray-800 border border-gray-600 rounded px-4 py-2" required>
            </div>

            <div>
                <label for="opis" class="block mb-1 font-medium">Opis usluge</label>
                <textarea name="opis" id="opis" class="w-full bg-gray-800 border border-gray-600 rounded px-4 py-2" rows="5"></textarea>
            </div>

            <div>
                <label for="cena" class="block mb-1 font-medium">Cena (RSD)</label>
                <input type="number" name="cena" class="w-full bg-gray-800 border border-gray-600 rounded px-4 py-2" required>
            </div>

            <div class="flex items-center space-x-2">
                <input type="checkbox" name="featured" id="featured" class="form-checkbox text-indigo-500 bg-gray-800 border-gray-600">
                <label for="featured" class="text-sm">Istaknuto (prikaz na početnoj)</label>
            </div>

            <div class="flex space-x-3">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 px-6 py-2 rounded text-white">💾 Sačuvaj</button>
                <a href="{{ route('admin.usluge.index') }}" class="bg-gray-700 hover:bg-gray-600 px-6 py-2 rounded text-white">← Nazad</a>
            </div>
        </form>
    </div>
</div>

<!-- Summernote -->
@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>
<script>
    $(document).ready(function () {
        $('#opis').summernote({
            placeholder: 'Unesite opis...',
            tabsize: 2,
            height: 200
        });

        $('form').on('submit', function () {
            $('#opis').val($('#opis').summernote('code'));
        });
    });
</script>
@endpush
@endsection
