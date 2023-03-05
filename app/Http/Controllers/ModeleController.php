<?php

namespace App\Http\Controllers;

use App\Models\Modele;
use App\Models\Marque;
use Illuminate\Http\Request;

class ModeleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $modeles = Modele::all();
        $modeles = Modele::join('marques', 'modeles.marque_id', '=', 'marques.id')
                    ->select('modeles.*', 'marques.designation')
                    ->get();

        return view('modele.ListerModele', [
            'modeles' => $modeles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $marques = Marque::all();
        return view('modele.AjouterModele', [
            'marques' => $marques
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nouvelleModele = Modele::create([
            'designation' => $request->des,
            'annee_modele' => $request->annee,
            'marque_id' => $request->marque
        ]);
        session()->flash('success', 'Modele Add successfully.');
        return redirect('/modele');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modele $modele)
    {
        $marques = Marque::all();
        return view('modele.EditModele', [
            'modele' => $modele,
            'marques' => $marques
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Modele $modele)
    {
        $modele->update([
            'designation' => $request->des,
            'annee_modele' => $request->fab,
            'marque_id' => $request->marque
        ]);
        session()->flash('success', 'Modele updated successfully.');
        return redirect('/modele');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modele $modele)
    {
        $modele->delete();
        // $theModele = Modele::find($modele);
        // $theModele->delete();
        session()->flash('success', 'Modele deleted successfully.');
        return redirect('/modele');
    }
}
