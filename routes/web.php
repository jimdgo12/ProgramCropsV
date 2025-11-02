<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\home\IndexController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\Crop;
use App\Models\Seed;
use App\Models\Disease;
use App\Models\Fertilizer;
use App\Models\Pesticide;

//================== RUTAS VUE (PÚBLICAS) ========================

// Página principal (ahora sí usa el controlador que trae los cultivos desde la API)
Route::get('/', [IndexController::class, 'index'])->name('index');

// Información por entidad
Route::get('/information-crop/{id}', [IndexController::class, 'getCropInformation'])->name('informationCrop');
Route::get('/crop/{id}', fn($id) => redirect()->route('informationCrop', ['id' => $id]));

Route::get('/information-seeds/{id}', [IndexController::class, 'getSeedsInformation'])->name('informationSeeds');
Route::get('/information-diseases/{id}', [IndexController::class, 'getDiseasesInformation'])->name('informationDiseases');
Route::get('/information-fertilizers/{id}', [IndexController::class, 'getFertilizersInformation'])->name('informationFertilizers');
Route::get('/information-pesticides/{crop}/{disease}', [IndexController::class, 'getPesticidesInformation'])->name('informationPesticides');

//================== RUTAS ADMIN (VUE) ==========================

Route::get('/admin/welcome', fn () => Inertia::render('admin/Welcome'))->name('WelcomeAdmin');

Route::get('/admin/crops', fn () => Inertia::render('admin/Crops/Index'))->name('admin.crops.index');
Route::get('/admin/seeds', fn () => Inertia::render('admin/Seeds/Index'))->name('admin.seeds.index');
Route::get('/admin/fertilizers', fn () => Inertia::render('admin/Fertilizers/Index'))->name('admin.fertilizers.index');
Route::get('/admin/diseases', fn () => Inertia::render('admin/Diseases/Index'))->name('admin.diseases.index');
Route::get('/admin/pesticides', fn () => Inertia::render('admin/Pesticides/Index'))->name('admin.pesticides.index');

// Rutas específicas por entidad
Route::get('/admin/diseases/crop/{id}', function ($id) {
    $crop = Crop::with('diseases')->findOrFail($id);
    return Inertia::render('admin/Diseases/CropDiseases', ['crop' => $crop]);
})->name('admin.diseases.crop');

Route::get('/admin/fertilizers/crop/{id}', function ($id) {
    $crop = Crop::with('fertilizers')->findOrFail($id);
    return Inertia::render('admin/Fertilizers/CropFertilizers', ['crop' => $crop]);
});

Route::get('/admin/pesticides/disease/{id}', function ($id) {
    $disease = Disease::with('pesticides')->findOrFail($id);
    return Inertia::render('admin/Pesticides/DiseasePesticides', ['disease' => $disease]);
});

//================= RUTAS DE SESIÓN (VUE) =======================

Route::get('/login', fn () => Inertia::render('auth/Login'))->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('start');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/register', fn () => Inertia::render('auth/Register'))->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('save');

//================= ASOCIACIONES =======================

Route::post('/diseases/{id}/crops', 'admin\DiseaseController@associateCrops')->name('diseases.associateCrops');
