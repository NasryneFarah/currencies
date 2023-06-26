<?php

namespace App\Http\Controllers;

use App\Models\Conversion;
use App\Models\Currency;
use Exception;
use Illuminate\Http\Request;

// il me permettre de gérer mes paires de monnaies 

class ConversionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       try{
        return response()->json([
            'status' => 200,
            "message" => "La liste des paires a été récupéré",
            "data" => Conversion::all()
        ]);
        
       } 
       catch(Exception $e){
        return response()->json($e);
       }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ExchangeRate' =>'required',
            'SourceCurrency' => 'required',
            'TargetCurrency' => 'required',
        ]);

        // je vérifie si ma paire existe déjà
        $convert = Conversion::where('SourceCurrency', $request->input('SourceCurrency'))
            ->where('TargetCurrency', $request->input('TargetCurrency'))
            ->first();
    
        if ($convert) {
            // si elle existe
            return response()->json([
                'status' => 'false',
                'message' => 'La paire de devises existe déjà',
            ]);
        }
        // si elle n'existe pas j'en crée une
        $convert = new Conversion();
        $convert->ExchangeRate =$request->input('ExchangeRate');
        $convert->SourceCurrency =$request->input('SourceCurrency');
        $convert->TargetCurrency =$request->input('TargetCurrency');
        $convert->save();
    
        return response()->json([
            'status' => 'true',
            'message' => 'Nouvelle paire créée',
           
        ]);

}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

         $request->validate([
            'ExchangeRate' =>'required',
            'SourceCurrency' => 'required',
            'TargetCurrency' => 'required',
        ]);

        $convert = Conversion::find($id); //je récupérère une paire grâce à son Id

        $convert->ExchangeRate =$request->input('ExchangeRate');
        $convert->SourceCurrency =$request->input('SourceCurrency');
        $convert->TargetCurrency =$request->input('TargetCurrency');
        $convert->update();

        return response()->json([
            'status' => 'true',
            'message' => 'Paire modifié',
           
        ]);
       
    }

    public function delete(Conversion $id)
    {
        try {
            $id->delete(); //il vérifie la paire exsite et appelle la fonction delete
            return response()->json([
                'status' => 'true',
                'message' => 'Paire supprimée avec succès',
               
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
