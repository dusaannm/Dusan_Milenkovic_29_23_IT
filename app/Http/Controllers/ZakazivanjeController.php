<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vozilo;
use App\Models\Pregled;
use Illuminate\Support\Facades\Auth;

class ZakazivanjeController extends Controller
{
    public function create()
    {
        // Generiši slobodne termine
        $sviTermini = [];
        $dan = now()->startOfWeek()->addDay(); // ponedeljak

        for ($i = 0; $i < 5; $i++) {
            $trenutniDan = $dan->copy()->addDays($i);
            for ($sat = 8; $sat < 16; $sat++) {
                foreach ([0, 30] as $minut) {
                    $sviTermini[] = [
                        'datum' => $trenutniDan->toDateString(),
                        'vreme' => sprintf('%02d:%02d:00', $sat, $minut),
                    ];
                }
            }
        }

        // Ukloni zauzete termine
        $zauzeti = Pregled::all()->map(function ($p) {
            return $p->datum . ' ' . $p->vreme;
        })->toArray();

        $slobodni = array_filter($sviTermini, function ($t) use ($zauzeti) {
            return !in_array($t['datum'] . ' ' . $t['vreme'], $zauzeti);
        });

        return view('zakazi', ['termini' => $slobodni]);
    }

    public function store(Request $request)
{

    $request->validate([
        'ime' => 'required|string',
        'prezime' => 'required|string',
        'email' => 'required|email',
        'marka' => 'required|string',
        'model' => 'required|string',
        'godiste' => 'required|integer|min:1900|max:' . now()->year,
        'datum' => 'required',
    ]);

    $user = Auth::user();
    $user->save();

    [$datum, $vreme] = explode('|', $request->datum);

    $vozilo = Vozilo::create([
        'marka' => $request->marka,
        'model' => $request->model,
        'godiste' => $request->godiste,
        'registracija' => '',
        'vlasnik' => $request->ime . ' ' . $request->prezime,
        'featured' => false,
    ]);

    Pregled::create([
        'user_id' => Auth::id(),
        'vozilo_id' => $vozilo->id,
        'datum' => $datum,
        'vreme' => $vreme,
    ]);

    return redirect()->route('dashboard')->with('success', 'Pregled uspešno zakazan!');
}
public function mojiTermini()
{
    $pregledi = \App\Models\Pregled::where('user_id', auth()->id())
        ->with('vozilo')
        ->orderByDesc('datum')
        ->get();

    return view('moji-termini', compact('pregledi'));
}



}

