<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VoitureFormeRequest;
use App\Models\Voiture;
use Illuminate\Http\Request;

class VoitureController extends Controller
{
    public function index()
    {
        return view('admin.voitures.index',[
            'voitures' => Voiture::paginate(25),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $voiture = new Voiture();

        return view('admin.voitures.create',[
            'voiture'=> $voiture,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VoitureFormeRequest $request, Voiture $voiture)
    {
        $validatedData = $request->validated();
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'), $imageName);
            // Enregistrez le chemin de l'image dans les données validées
            $validatedData['image'] = 'images/'.$imageName;
        }

        Voiture::create($validatedData);

        return redirect()->route('admin.voiture.index')->with('success', 'La voiture a été bien créé');

    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Voiture $voiture)
    {
        return view('admin.voitures.create', [
            'voiture'=> $voiture,
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VoitureFormeRequest $request, Voiture $voiture)
    { 
        $validatedData = $request->validated();
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'), $imageName);
            
            $validatedData['image'] = 'images/'.$imageName;
        }

        $voiture->update($validatedData);
        return redirect()->route('admin.voiture.index')->with('success','la voiture a été bien modifiée');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voiture $voiture)
    {
        $voiture->delete();
        return redirect()->route('admin.voiture.index')->with('success','la voiture a été bien supprimée');
    }
}
