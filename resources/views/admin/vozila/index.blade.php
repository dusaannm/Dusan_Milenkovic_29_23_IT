@extends('layouts.app')

@section('content')
<div class="bg-gray-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6">🚗 Vozila</h1>

        <a href="{{ route('admin.vozila.create') }}" class="bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">+ Dodaj novo vozilo</a>

        @if(session('success'))
            <div class="bg-green-700 text-white p-3 rounded mb-4">{{ session('success') }}</div>
        @endif

        <div class="overflow-x-auto rounded-xl shadow-lg">
            <table id="vozilaTabela" class="min-w-full bg-gray-800 text-white">
                <thead class="bg-gray-700">
                    <tr>
                        <th class="p-3 text-left">Slika</th>
                        <th class="p-3 text-left">Marka</th>
                        <th class="p-3 text-left">Model</th>
                        <th class="p-3 text-left">Godište</th>
                        <th class="p-3 text-left">Registracija</th>
                        <th class="p-3 text-left">Istaknuto</th>
                        <th class="p-3 text-left">Akcije</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vozila as $vozilo)
                        <tr class="border-t border-gray-700 hover:bg-gray-700">
                            <td class="p-3">
                                @if($vozilo->slika)
                                    <img src="{{ asset('storage/' . $vozilo->slika) }}" alt="Slika vozila" class="h-16 rounded shadow">
                                @else
                                    <span class="text-gray-400">Nema sliku</span>
                                @endif
                            </td>
                            <td class="p-3">{{ $vozilo->marka }}</td>
                            <td class="p-3">{{ $vozilo->model }}</td>
                            <td class="p-3">{{ $vozilo->godiste }}</td>
                            <td class="p-3">{{ $vozilo->registracija }}</td>
                            <td class="p-3">
                                @if($vozilo->featured)
                                    <span class="text-green-400 font-semibold">DA</span>
                                @else
                                    <span class="text-gray-400">NE</span>
                                @endif
                            </td>
                            <td class="p-3 space-x-2">
                                <a href="{{ route('admin.vozila.edit', $vozilo) }}" class="bg-yellow-500 hover:bg-yellow-400 text-black px-3 py-1 rounded">Izmeni</a>
                                <form action="{{ route('admin.vozila.destroy', $vozilo) }}" method="POST" class="inline-block" onsubmit="return confirm('Obrisati vozilo?')">
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
        $('#vozilaTabela').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/sr-SP.json"
            }
        });
    });
</script>

@endsection
