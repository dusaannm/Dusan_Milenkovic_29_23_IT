<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pregled;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TerminController extends Controller
{
    public function index()
    {
        $termini = Pregled::with('vozilo')->latest()->get();

        // Grupisanje termina po datumu (za grafikon)
        $terminiPoDanu = DB::table('pregleds')
            ->select('datum', DB::raw('count(*) as broj'))
            ->groupBy('datum')
            ->orderBy('datum', 'asc')
            ->get();

        return view('admin.termini.index', compact('termini', 'terminiPoDanu'));
    }

    public function edit($id)
    {
        $termin = Pregled::with('vozilo')->findOrFail($id);
        return view('admin.termini.edit', compact('termin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'datum' => 'required|date',
            'vreme' => 'required',
            'marka' => 'required|string',
            'model' => 'required|string',
            'godiste' => 'required|integer|min:1900|max:' . now()->year,
            'vlasnik' => 'nullable|string',
        ]);

        $termin = Pregled::findOrFail($id);
        $vozilo = $termin->vozilo;

        $vozilo->update([
            'marka' => $request->marka,
            'model' => $request->model,
            'godiste' => $request->godiste,
            'vlasnik' => $request->vlasnik,
        ]);

        $termin->update([
            'datum' => $request->datum,
            'vreme' => $request->vreme,
        ]);

        return redirect()->route('admin.termini.index')->with('success', 'Termin uspešno izmenjen.');
    }

    public function destroy($id)
    {
        \App\Models\Pregled::destroy($id);
        return redirect()->route('admin.termini.index')->with('success', 'Termin uspešno obrisan.');
    }
}
