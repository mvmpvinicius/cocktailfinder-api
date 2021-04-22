<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Cocktail extends Model
{    
    /**
     * apiCocktailUrl
     *
     * @var string $apiCocktailUrl
     */
    private $apiCocktailUrl;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->apiCocktailUrl = config('app.api_cocktail_url');
    }

        
    /**
     * It gets cocktails according to provided parameters
     *
     * @param  string $searchFor
     * @param  string $params
     * @param  string $searchBy
     * @return mixed
     */
    public function getCocktails($searchFor, $params, $searchBy = '')
    {
        $apiUrl = $this->apiCocktailUrl;

        /**
         * It gets ingredients by text
         */
        if ($searchFor === 'ingredients') {
            $apiUrl .= 'search.php?i=' . $params;
            $result = Http::get($apiUrl)['ingredients'];
        }

        /**
         * It gets detailed cocktails
         */
        if ($searchFor === 'cocktails' && $searchBy === 'ingredient') {
            $apiUrl .= 'filter.php?i=' . $params;

            $cocktails = Http::get($apiUrl);
            $result = array();

            foreach ($cocktails['drinks'] as $drink) {
                $apiUrl = $this->apiCocktailUrl . 'lookup.php?i=' . $drink['idDrink'];
                $result[] = Http::get($apiUrl)['drinks'];
            }
        }

        return $result;
    }
}
