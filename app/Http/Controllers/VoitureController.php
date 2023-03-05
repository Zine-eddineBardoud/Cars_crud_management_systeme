<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use App\Models\Modele;
use Illuminate\Http\Request;

class VoitureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $voitures = Voiture::join('modeles', 'voitures.modele_id', '=', 'modeles.id')
                    ->select('voitures.*', 'modeles.designation')
                    ->get();

        return view('voiture.ListerVoiture', [
            'voitures' => $voitures
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $modeles = Modele::all();
        return view('voiture.AjouterVoiture', [
            'modeles' => $modeles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nouvelleVoiture = Voiture::create([
            'matricule' => $request->mat,
            'kilometrage' => $request->km,
            'modele_id' => $request->modele
        ]);
        session()->flash('success', 'Voiture Add successfully.');
        return redirect('/voiture');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Voiture $voiture)
    {
        $modeles = Modele::all();
        return view('voiture.Editvoiture', [
            'voiture' => $voiture,
            'modeles' => $modeles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Voiture $voiture)
    {
        $voiture->update([
            'matricule' => $request->mat,
            'kilometrage' => $request->km,
            'modele_id' => $request->modele
        ]);
        session()->flash('success', 'Voiture updated successfully.');
        return redirect('/voiture');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voiture $voiture)
    {
        $voiture->delete();
        session()->flash('success', 'Voiture deleted successfully.');
        return redirect('/voiture');
    }
}
