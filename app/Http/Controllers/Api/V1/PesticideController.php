<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Pesticide;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePesticideRequest; // Request de Creación
use App\Http\Requests\UpdatePesticideRequest; // Request de Actualización
use Illuminate\Http\Request;

class PesticideController extends Controller
{
    
    protected $relations = ['diseases']; 

    
    public function index()
    {
        $pesticides = Pesticide::with($this->relations)->get();
        return response()->json($pesticides);
    }

   
    public function store(StorePesticideRequest $request)
    {
        $pesticide = Pesticide::create($request->validated());
         if ($request->has('disease_ids')) {
            $pesticide->diseases()->sync($request->input('disease_ids'));
        }

         return response()->json($pesticide->load($this->relations), 201);
    }

    
    public function show(Pesticide $pesticide)
    {
        return response()->json($pesticide->load($this->relations));
    }

    
    public function update(UpdatePesticideRequest $request, Pesticide $pesticide)
    {
        $pesticide->update($request->validated());
        
         if ($request->has('disease_ids')) {
            $pesticide->diseases()->sync($request->input('disease_ids'));
        }

        return response()->json($pesticide->load($this->relations));
    }

    public function destroy(Pesticide $pesticide)
    {
        $pesticide->diseases()->sync([]); 
        
      $pesticide->delete();
        
       return response()->json(null, 204);
    }
}