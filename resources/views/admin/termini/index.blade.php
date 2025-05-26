@extends('layouts.app')

@section('content')
<div class="bg-gray-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h1 class="text-3xl font-bold mb-8">📅 Zakazani termini</h1>

        @if(session('success'))
            <div class="bg-green-700 text-white p-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <h2 class="text-xl font-semibold mb-4">Grafikon termina po danima</h2>
        <div class="bg-gray-800 p-4 rounded-xl mb-8 overflow-x-auto">
            <canvas id="terminiChart" class="w-full h-64"></canvas>
        </div>

        <div class="overflow-x-auto rounded-xl shadow">
            <table id="terminiTabela" class="min-w-full bg-gray-800 text-white">
                <thead class="bg-gray-700">
                    <tr>
                        <th class="p-3 text-left">Vlasnik</th>
                        <th class="p-3 text-left">Email</th>
                        <th class="p-3 text-left">Vozilo</th>
                        <th class="p-3 text-left">Godište</th>
                        <th class="p-3 text-left">Datum</th>
                        <th class="p-3 text-left">Vreme</th>
                        <th class="p-3 text-left">Akcije</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($termini as $t)
                        <tr class="border-t border-gray-700 hover:bg-gray-700">
                            <td class="p-3">{{ $t->vozilo->vlasnik ?? 'Nepoznato' }}</td>
                            <td class="p-3">{{ $t->user->email ?? 'Nepoznat' }}</td>
                            <td class="p-3">{{ $t->vozilo->marka }} {{ $t->vozilo->model }}</td>
                            <td class="p-3">{{ $t->vozilo->godiste }}</td>
                            <td class="p-3">{{ $t->datum }}</td>
                            <td class="p-3">{{ \Carbon\Carbon::parse($t->vreme)->format('H:i') }}</td>
                            <td class="p-3 space-x-2">
                                <a href="{{ route('admin.termini.edit', $t->id) }}" class="bg-yellow-500 hover:bg-yellow-400 text-black px-3 py-1 rounded">Izmeni</a>
                                <form action="{{ route('admin.termini.destroy', $t->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Obrisati termin?')">
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

<!-- DataTables & Chart.js -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        $('#terminiTabela').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/sr-SP.json"
            }
        });
    });

    const ctx = document.getElementById('terminiChart').getContext('2d');

    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($terminiPoDanu->pluck('datum')) !!},
            datasets: [{
                label: 'Broj termina',
                data: {!! json_encode($terminiPoDanu->pluck('broj')) !!},
                backgroundColor: 'rgba(99, 102, 241, 0.8)',
                borderRadius: 6,
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            },
            plugins: {
                legend: { display: false }
            }
        }
    });
</script>
@endsection
