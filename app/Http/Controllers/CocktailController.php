<?php

namespace App\Http\Controllers;

use App\Models\Cocktail;
use Illuminate\Http\Request;

class CocktailController extends Controller
{    
    /**
     * cocktail
     *
     * @var string $cocktail
     */
    private $cocktail;

        
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        Cocktail $cocktail
    ) {
        $this->cocktail = $cocktail;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validatedParams = $request->validate([
            'params'     => 'required|max:255',
            'search-for' => 'required|max:255',
        ]);

        $searchBy = $request['search-by'] ? $request['search-by'] : '';

        /**
         * Get cocktails with search by, search for and parameters
         */
        $resCocktails = $this->cocktail->getCocktails(
            $validatedParams['search-for'],
            $validatedParams['params'],
            $searchBy
        );

        return $resCocktails;

        // return response()->json(['status' => 'success', 'data' => $resCocktails], 200);
        // return response()->json(['status' => 'failed', 'data' => $resCocktails], 400);
    }
}