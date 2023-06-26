<?php

namespace Database\Seeders;

use App\Models\Conversion;
use App\Models\Currency;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ConversionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ma variable convert me permet de récupérer tous les éléments de ma table currencies
      $convert = Currency::all();

      //switch me permet de créer des combinaisons entre mes monnaies
      $switch = $convert->crossJoin($convert)->filter(function($pair){
        return $pair[0]->id !== $pair[1]->id; // il me permet de filtrer les paires ayant le même id
    }); 
     
        //ma boucle me permet d'accéder au tableau créer par $switch et il va créer un objet qui va stocker chaque combinaison 
    foreach( $switch as $s) {
        $conversion= new Conversion();
        $randomNumber = mt_rand(1, 100) / 100; // Génère un nombre aléatoire entre 0 et 100  puis le divise par 100 pour obtenir un porcentage entre 0 et 1

        $conversion->ExchangeRate = $randomNumber;
        $conversion->SourceCurrency = $s[0]->id;
        $conversion->TargetCurrency = $s[1]->id;
        $conversion->save();
    }     
    }
}
