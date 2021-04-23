<?php

namespace Tests\Feature;

use Illuminate\Http\Request;
use Tests\TestCase;

class CocktailControllerTest extends TestCase
{    
    /**
     * It should assert status 200 for success request
     *
     * @return void
     */
    public function testItShouldRetrieveCocktails()
    {
        $response = $this->json(Request::METHOD_GET, route('cocktail.index', [
            'search-for' => 'cocktails',
            'params'     => 'ouzo',
        ]));

        $response->assertStatus(200);
    }

    /**
     * It should assert status 200 for success request
     *
     * @return void
     */
    public function testItShouldRetrieveIngredients()
    {
        $response = $this->json(Request::METHOD_GET, route('cocktail.index', [
            'search-for' => 'ingredients',
            'params'     => 'ouzo',
        ]));

        $response->assertStatus(200);
    }

    /**
     * It should assert status 422 for failed request
     *
     * @return void
     */
    public function testItShouldFailRetrieveDataWrongParam()
    {
        $response = $this->json(Request::METHOD_GET, route('cocktail.index', [
            'search-for' => 'inexistent searchfor param',
            'params'     => 'ouzo',
        ]));

        $response->assertStatus(422);
    }
}