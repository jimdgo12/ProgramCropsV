<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Seed;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSeedRequest; // Request de Creación
use App\Http\Requests\UpdateSeedRequest; // Request de Actualización
use Illuminate\Http\Request;

class SeedController extends Controller
{
      protected $relations = ['crop']; 

   
    public function index()
    {
        $seeds = Seed::with($this->relations)->get();
        return response()->json($seeds);
    }

    public function store(StoreSeedRequest $request)
    {
        $seed = Seed::create($request->validated());
        
        return response()->json($seed->load($this->relations), 201);
    }

   public function show(Seed $seed)
    {
        return response()->json($seed->load($this->relations));
    }

    public function update(UpdateSeedRequest $request, Seed $seed)
    {
        $seed->update($request->validated());
        
        return response()->json($seed->load($this->relations));
    }

     public function destroy(Seed $seed)
    {
        $seed->delete();
        return response()->json(null, 204);
    }
}