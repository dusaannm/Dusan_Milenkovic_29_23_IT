@extends('layouts.app')

@section('content')
<div class="bg-gray-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6">🧾 Usluge</h1>

        <a href="{{ route('admin.usluge.create') }}" class="bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">+ Dodaj novu uslugu</a>

        @if(session('success'))
            <div class="bg-green-700 text-white p-3 rounded mb-4">{{ session('success') }}</div>
        @endif

        <div class="overflow-x-auto rounded-xl shadow-lg">
            <table id="uslugeTabela" class="min-w-full bg-gray-800 text-white">
                <thead class="bg-gray-700">
                    <tr>
                        <th class="p-3 text-left">Naziv</th>
                        <th class="p-3 text-left">Opis</th>
                        <th class="p-3 text-left">Cena</th>
                        <th class="p-3 text-left">Istaknuta</th>
                        <th class="p-3 text-left">Akcije</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usluge as $usluga)
                        <tr class="border-t border-gray-700 hover:bg-gray-700">
                            <td class="p-3">{{ $usluga->naziv }}</td>
                            <td class="p-3">{!! Str::limit(strip_tags($usluga->opis), 60) !!}</td>
                            <td class="p-3">{{ $usluga->cena }} RSD</td>
                            <td class="p-3">{{ $usluga->featured ? 'DA' : 'NE' }}</td>
                            <td class="p-3 space-x-2">
                                <a href="{{ route('admin.usluge.edit', $usluga->id) }}" class="bg-yellow-500 hover:bg-yellow-400 text-black px-3 py-1 rounded">Izmeni</a>
                                <form action="{{ route('admin.usluge.destroy', $usluga->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Obrisati uslugu?')">
                                    @csrf @method('DELETE')
                                    <button class="bg-red-600 hover:bg-red-500 px-3 py-1 rounded text-white">Obriši</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- DataTables CSS & JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        $('#uslugeTabela').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/sr-SP.json"
            }
        });
    });
</script>

@endsection
