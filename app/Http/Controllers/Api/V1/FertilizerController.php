<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Fertilizer;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFertilizerRequest;
use App\Http\Requests\UpdateFertilizerRequest;
use Illuminate\Http\Request;

class FertilizerController extends Controller
{
    
    protected $relations = ['crops']; 

    
    public function index()
    {
        $fertilizers = Fertilizer::with($this->relations)->get();
        return response()->json($fertilizers);
    }

    
    public function store(StoreFertilizerRequest $request)
    {
        
        $fertilizer = Fertilizer::create($request->validated());
        
        if ($request->has('crop_ids')) {
            $fertilizer->crops()->sync($request->input('crop_ids'));
        }

        
        return response()->json($fertilizer->load($this->relations), 201);
    }

    
    public function show(Fertilizer $fertilizer)
    {
        return response()->json($fertilizer->load($this->relations));
    }

    
    public function update(UpdateFertilizerRequest $request, Fertilizer $fertilizer)
    {
        
        $fertilizer->update($request->validated());
        
        
        if ($request->has('crop_ids')) {
            $fertilizer->crops()->sync($request->input('crop_ids'));
        }

        
        return response()->json($fertilizer->load($this->relations));
    }

    
    public function destroy(Fertilizer $fertilizer)
    {
        
        $fertilizer->crops()->sync([]); 
        
        
        $fertilizer->delete();
        
        return response()->json(null, 204);
    }
}