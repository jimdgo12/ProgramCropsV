<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\CropController;
use App\Http\Controllers\Api\V1\DiseaseController;
use App\Http\Controllers\Api\V1\SeedController;
use App\Http\Controllers\Api\V1\FertilizerController;
use App\Http\Controllers\Api\V1\PesticideController;

Route::prefix('api/v1')->name('api.v1.')->group(function () {
    
    // 🌾 Cultivos
    Route::get('crops', [CropController::class, 'index'])->name('crops.index');
    Route::post('crops', [CropController::class, 'store'])->name('crops.store');
    Route::put('crops/{id}', [CropController::class, 'update'])->name('crops.update');
    Route::delete('crops/{id}', [CropController::class, 'destroy'])->name('crops.destroy');

    // 🦠 Enfermedades
    Route::get('diseases', [DiseaseController::class, 'index'])->name('diseases.index');
    Route::post('diseases', [DiseaseController::class, 'store'])->name('diseases.store');
    Route::put('diseases/{id}', [DiseaseController::class, 'update'])->name('diseases.update');
    Route::delete('diseases/{id}', [DiseaseController::class, 'destroy'])->name('diseases.destroy');

    // 🌱 Semillas
    Route::get('seeds', [SeedController::class, 'index'])->name('seeds.index');
    Route::post('seeds', [SeedController::class, 'store'])->name('seeds.store');
    Route::put('seeds/{id}', [SeedController::class, 'update'])->name('seeds.update');
    Route::delete('seeds/{id}', [SeedController::class, 'destroy'])->name('seeds.destroy');

    // 🧪 Fertilizantes
    Route::get('fertilizers', [FertilizerController::class, 'index'])->name('fertilizers.index');
    Route::post('fertilizers', [FertilizerController::class, 'store'])->name('fertilizers.store');
    Route::put('fertilizers/{id}', [FertilizerController::class, 'update'])->name('fertilizers.update');
    Route::delete('fertilizers/{id}', [FertilizerController::class, 'destroy'])->name('fertilizers.destroy');

    // 🐞 Pesticidas
    Route::get('pesticides', [PesticideController::class, 'index'])->name('pesticides.index');
    Route::post('pesticides', [PesticideController::class, 'store'])->name('pesticides.store');
    Route::put('pesticides/{id}', [PesticideController::class, 'update'])->name('pesticides.update');
    Route::delete('pesticides/{id}', [PesticideController::class, 'destroy'])->name('pesticides.destroy');
});
