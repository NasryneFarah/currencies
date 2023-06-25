<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //mes différentes monnaies qui sont stockées dans ma table currencies
        $currency = new Currency();
        $currency->CurrencyCode = "USD";
        $currency->currencyName = "Dollar américain";
        $currency->save();

        $currency = new Currency();
        $currency->CurrencyCode = "EUR";
        $currency->currencyName = "Euro";
        $currency->save();

        $currency = new Currency();
        $currency->CurrencyCode = "JPY";
        $currency->currencyName = "Yen japonais";
        $currency->save();

        $currency = new Currency();
        $currency->CurrencyCode = "CAD";
        $currency->currencyName = "Dollar canadien";
        $currency->save();

        $currency = new Currency();
        $currency->CurrencyCode = "CHF";
        $currency->currencyName = "Franc suisse";
        $currency->save();


    }
}
