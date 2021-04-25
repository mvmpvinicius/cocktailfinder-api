<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class IngredientController extends Controller
{    
    /**
     * ingredient
     *
     * @var string $ingredient
     */
    private $ingredient;
        
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        Ingredient $ingredient
    ) {
        $this->ingredient = $ingredient;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validatedParams = $request->validate([
            'params' => 'required|max:255',
        ]);

        /**
         * Get ingredients with the parameters
         */
        $resIngredients = $this->ingredient->getIngredients(
            $validatedParams['params'],
        );

        return response()->json([$resIngredients]);
    }
}
