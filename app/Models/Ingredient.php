<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Ingredient extends Model
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
     * It gets ingredients according to the provided parameters
     *
     * @param  string $params
     * @return mixed
     */
    public function getIngredients($params)
    {
        $apiUrl = $this->apiCocktailUrl;

        /**
         * It gets ingredients by text
         */
        $apiUrl .= 'search.php?i=' . $params;
        $result = Http::get($apiUrl)['ingredients'];

        return $result;
    }
}
