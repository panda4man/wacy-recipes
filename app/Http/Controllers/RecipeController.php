<?php

namespace App\Http\Controllers;

use App\Http\Resources\Recipe as ResourcesRecipe;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = QueryBuilder::for(Recipe::class)
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return ResourcesRecipe::collection($recipes);
    }

    public function show(Recipe $recipe)
    {
        return ResourcesRecipe::make($recipe);
    }
}
