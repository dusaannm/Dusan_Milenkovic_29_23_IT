<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Usluga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UslugaController extends Controller
{
    public function index()
    {
        $usluge = Usluga::all();
        return view('admin.usluge.index', compact('usluge'));
    }

    public function create()
    {
        return view('admin.usluge.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'naziv' => 'required|string|max:255',
            'opis' => 'nullable|string',
            'cena' => 'required|numeric|min:0',
            'featured' => 'nullable|boolean',
        ]);

        Usluga::create([
            'naziv' => $request->naziv,
            'opis' => $request->opis,
            'cena' => $request->cena,
            'featured' => $request->has('featured'),
        ]);

        return redirect()->route('admin.usluge.index')->with('success', 'Usluga uspešno dodata.');
    }

    public function edit(Usluga $usluga)
    {
        return view('admin.usluge.edit', compact('usluga'));
    }

    public function update(Request $request, Usluga $usluga)
{
    Log::info('Update metoda pokrenuta');

    $request->validate([
        'naziv' => 'required|string|max:255',
        'opis' => 'nullable|string',
        'cena' => 'required|numeric|min:0',
        'featured' => 'nullable|boolean',
    ]);

    $usluga->naziv = $request->naziv;
    $usluga->opis = $request->opis;
    $usluga->cena = $request->cena;
    $usluga->featured = $request->has('featured');
    $usluga->save();

    if ($usluga->wasChanged()) {
        Log::info('Usluga izmenjena.');
    } else {
        Log::warning('Usluga NIJE izmenjena.');
    }

    // 🔥 OVO JE FALILO!
    return redirect()->route('admin.usluge.index')->with('success', 'Usluga uspešno izmenjena.');
}



    public function destroy(Usluga $usluga)
    {
        $usluga->delete();
        return redirect()->route('admin.usluge.index')->with('success', 'Usluga obrisana.');
    }

    public function show(Usluga $usluga)
{
    return view('usluge.show', compact('usluga'));
}

}
