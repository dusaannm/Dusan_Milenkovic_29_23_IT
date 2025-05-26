<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Models\Vozilo;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VoziloController;
use App\Http\Controllers\ZakazivanjeController;
use App\Http\Controllers\Admin\TerminController;
use App\Http\Controllers\Admin\UslugaController;
use App\Models\Usluga;


/*
|--------------------------------------------------------------------------
| Javni deo sajta
|--------------------------------------------------------------------------
*/

Route::get('/debugvozila', function () {
    return Vozilo::all();
});

Route::get('/', function () {
    $usluge = Usluga::where('featured', true)->get();
    return view('home', compact('usluge'));
})->name('home');

Route::get('/ponuda/{usluga}', [UslugaController::class, 'show'])->name('ponuda.show');



Route::get('/katalog', function (Request $request) {
    $query = Vozilo::query();

    if ($request->filled('marka')) {
        $query->where('marka', $request->input('marka'));
    }

    $vozila = $query->get();
    $sveMarke = Vozilo::select('marka')->distinct()->pluck('marka');

    return view('katalog', compact('vozila', 'sveMarke'));
})->name('katalog');

Route::get('/kontakt', function () {
    return view('kontakt');
})->name('kontakt');

Route::get('/usluge/{usluga}', [UslugaController::class, 'show'])->name('usluge.show');



Route::post('/kontakt', function (Request $request) {
    $request->validate([
        'ime' => 'required|string',
        'email' => 'required|email',
        'poruka' => 'required|string',
    ]);

    return back()->with('poruka_poslata', 'Hvala! Poruka je uspešno poslata.');
})->name('kontakt.posalji');

/*
|--------------------------------------------------------------------------
| Funkcionalnost za registrovane korisnike (zakazivanje)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/zakazi', [ZakazivanjeController::class, 'create'])->name('zakazi');
    Route::post('/zakazi', [ZakazivanjeController::class, 'store'])->name('zakazi.store');
    Route::get('/moji-termini', [ZakazivanjeController::class, 'mojiTermini'])->name('moji.termini');

});

/*
|--------------------------------------------------------------------------
| Admin deo (CRUD za vozila, termine i usluge)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return 'ADMIN ONLY';
    })->name('dashboard');

    Route::resource('vozila', VoziloController::class);
    Route::resource('termini', TerminController::class)->except(['create', 'store']);
    Route::resource('usluge', UslugaController::class)->parameters([
    'usluge' => 'usluga'
]);

});

/*
|--------------------------------------------------------------------------
| Dashboard za sve ulogovane
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Profil
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
