<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Crop;
use App\Models\Seed;
use App\Models\Disease;
use App\Models\Fertilizer;
use Inertia\Inertia;

class IndexController extends Controller
{
    /**
     * Muestra la página de inicio con la lista de cultivos.
     */
    public function index()
    {
        $crops = Crop::orderBy('id')->get();
        return Inertia::render('home/Index', ['crops' => $crops]);
    }

    /**
     * Muestra la información detallada de un cultivo.
     */
    public function getCropInformation($id)
    {
        $crop = Crop::with('seeds', 'diseases', 'fertilizers')->find($id);
        return Inertia::render('home/InformationCrop', ['crop' => $crop]);
    }

    /**
     * Muestra las semillas asociadas a un cultivo.
     */
    public function getSeedsInformation($id)
    {
        $crop = Crop::with('seeds')->find($id);
        $seeds = $crop?->seeds ?? [];
        $seeds = array_chunk($seeds->toArray(), 3);

        return Inertia::render('home/InformationSeeds', ['crop' => $crop, 'seeds' => $seeds]);
    }

    /**
     * Muestra las enfermedades asociadas a un cultivo.
     */
    public function getDiseasesInformation($id)
    {
        $crop = Crop::with('diseases')->find($id);
        $diseases = $crop?->diseases ?? [];

        return Inertia::render('home/InformationDiseases', ['crop' => $crop, 'diseases' => $diseases]);
    }

    /**
     * Muestra los pesticidas para una enfermedad específica de un cultivo.
     */
    public function getPesticidesInformation($cropId, $diseaseId)
    {
        $crop = Crop::find($cropId);
        $disease = Disease::with('pesticides')->find($diseaseId);
        $pesticides = $disease?->pesticides ?? [];

        return Inertia::render('home/InformationPesticides', [
            'crop' => $crop,
            'disease' => $disease,
            'pesticides' => $pesticides,
        ]);
    }

    /**
     * Muestra los fertilizantes asociados a un cultivo.
     */
    public function getFertilizersInformation($id)
    {
        $crop = Crop::with('fertilizers')->find($id);
        $fertilizers = $crop?->fertilizers ?? [];

        return Inertia::render('home/InformationFertilizer', [
            'crop' => $crop,
            'fertilizers' => $fertilizers,
        ]);
    }
}
