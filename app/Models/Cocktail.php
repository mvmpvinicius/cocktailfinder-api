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
     * @param  string $params
     * @return mixed
     */
    public function getCocktails($params)
    {
        $apiUrl = $this->apiCocktailUrl;

        /**
         * It gets detailed cocktails instructions by ingredient
         */
        $apiUrl .= 'filter.php?i=' . $params;

        $cocktails = Http::get($apiUrl);
        $result = array();

        if (isset($cocktails['drinks'])) {
            foreach ($cocktails['drinks'] as $drink) {
                $apiUrl = $this->apiCocktailUrl . 'lookup.php?i=' . $drink['idDrink'];
                $result[] = Http::get($apiUrl)['drinks'];
            }
        }

        return $result;
    }
}
