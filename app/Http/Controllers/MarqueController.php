<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marques = Marque::all();
        return view('marque.ListerMarques', [
            'marques' => $marques
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('marque.AjouterMarque');
    }

    /**
     * Store a newly created resource in storage.
      */
    public function store(Request $request)
    {
        $nouvelleMarque = Marque::create([
            'designation' => $request->des,
            'fabriquant' => $request->fab
        ]);
        session()->flash('success', 'Marque Add successfully.');
        return redirect('/marque');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marque $marque)
    {
        return view('marque.EditMarque', [
            'marque' => $marque
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marque $marque)
    {
        $marque->update([
            'designation' => $request->des,
            'fabriquant' => $request->fab
        ]);
        session()->flash('success', 'Marque updated successfully.');
        return redirect('/marque');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marque $marque)
    {
        $marque->delete();
        session()->flash('success', 'Marque deleted successfully.');
        return redirect('/marque');

    }
}
