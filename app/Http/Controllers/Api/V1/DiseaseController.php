<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Disease;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDiseaseRequest;
use App\Http\Requests\UpdateDiseaseRequest;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    
    protected $relations = ['crops', 'pesticides'];

    public function index()
    {
        $diseases = Disease::with($this->relations)->get();
        return response()->json($diseases);
    }
    
    public function store(StoreDiseaseRequest $request)
    {
        
        $disease = Disease::create($request->validated());

        if ($request->has('pesticide_ids')) {
            $disease->pesticides()->sync($request->input('pesticide_ids'));
        }

        return response()->json($disease->load($this->relations), 201);
    }

    
    public function show(Disease $disease)
    {
        return response()->json($disease->load($this->relations));
    }

    
    public function update(UpdateDiseaseRequest $request, Disease $disease)
    {
        
        $disease->update($request->validated());

       
        if ($request->has('pesticide_ids')) {
            $disease->pesticides()->sync($request->input('pesticide_ids'));
        }

        
        return response()->json($disease->load($this->relations));
    }

    
    public function destroy(Disease $disease)
    {
        
        $disease->pesticides()->sync([]); 
        
       
        $disease->delete();
        
        return response()->json(null, 204);
    }
}