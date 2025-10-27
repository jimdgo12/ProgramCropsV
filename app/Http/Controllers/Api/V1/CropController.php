<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Crop;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCropRequest;
use App\Http\Requests\UpdateCropRequest;
use App\Http\Controllers\Controller;

class CropController extends Controller
{
    
    protected $relations = ['diseases', 'fertilizers', 'seeds'];

    
    public function index()
    {
        $crops = Crop::with($this->relations)->get();
        return response()->json($crops);
    }

    
     
    public function store(StoreCropRequest $request)
    {
        
        $crop = Crop::create($request->validated());

        
        if ($request->has('disease_ids')) {
            $crop->diseases()->sync($request->input('disease_ids'));
        }
        if ($request->has('fertilizer_ids')) {
            $crop->fertilizers()->sync($request->input('fertilizer_ids'));
        }

        
        return response()->json($crop->load($this->relations), 201);
    }

    
    public function show(Crop $crop)
    {
        
        return response()->json($crop->load($this->relations));
    }

    
    public function update(UpdateCropRequest $request, Crop $crop)
    {
        
        $crop->update($request->validated());

        
        if ($request->has('disease_ids')) {
            $crop->diseases()->sync($request->input('disease_ids'));
        }
        if ($request->has('fertilizer_ids')) {
            $crop->fertilizers()->sync($request->input('fertilizer_ids'));
        }        
        return response()->json($crop->load($this->relations));
    }

    
    public function destroy(Crop $crop)
    {       
        $crop->delete();       
        
        return response()->json(null, 204);
    }
}