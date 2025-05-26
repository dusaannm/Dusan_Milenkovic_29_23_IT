<?php

namespace App\Http\Controllers;

use App\Models\Vozilo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VoziloController extends Controller
{
    public function index()
    {
        $vozila = Vozilo::all();
        return view('admin.vozila.index', compact('vozila'));
    }

    public function create()
    {
        return view('admin.vozila.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'marka' => 'required|string',
            'model' => 'required|string',
            'godiste' => 'required|integer|min:1900|max:' . now()->year,
            'registracija' => 'required|string',
            'slika' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $vozilo = new Vozilo();
        $vozilo->marka = $request->input('marka');
        $vozilo->model = $request->input('model');
        $vozilo->godiste = $request->input('godiste');
        $vozilo->registracija = $request->input('registracija');
        $vozilo->featured = $request->boolean('featured');

        if ($request->hasFile('slika')) {
            $path = $request->file('slika')->store('slike', 'public');
            $vozilo->slika = $path;
        }

        $vozilo->save();

        return redirect()->route('admin.vozila.index')->with('success', 'Vozilo uspešno dodato.');
    }

    public function show($id)
    {
        $vozilo = Vozilo::findOrFail($id);
        return view('admin.vozila.show', compact('vozilo'));
    }

    public function edit($id)
    {
        $vozilo = Vozilo::findOrFail($id);
        return view('admin.vozila.edit', compact('vozilo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'marka' => 'required|string',
            'model' => 'required|string',
            'godiste' => 'required|integer|min:1900|max:' . now()->year,
            'registracija' => 'required|string',
            'featured' => 'nullable|boolean',
            'slika' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $vozilo = Vozilo::findOrFail($id);

        $vozilo->marka = $request->input('marka');
        $vozilo->model = $request->input('model');
        $vozilo->godiste = $request->input('godiste');
        $vozilo->registracija = $request->input('registracija');
        $vozilo->featured = $request->has('featured') ? 1 : 0;

        if ($request->hasFile('slika')) {
            // obriši staru sliku ako postoji
            if ($vozilo->slika) {
                Storage::disk('public')->delete($vozilo->slika);
            }

            $path = $request->file('slika')->store('slike', 'public');
            $vozilo->slika = $path;
        }

        $vozilo->save();

        return redirect()->route('admin.vozila.index')->with('success', 'Vozilo uspešno izmenjeno.');
    }

    public function destroy($id)
    {
        $vozilo = Vozilo::findOrFail($id);

        if ($vozilo->slika) {
            Storage::disk('public')->delete($vozilo->slika);
        }

        $vozilo->delete();

        return redirect()->route('admin.vozila.index')->with('success', 'Vozilo je obrisano.');
    }
}
