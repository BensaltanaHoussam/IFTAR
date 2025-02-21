<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;

class Recipes extends Controller
{
    public function indexRecips(Request $request)
    {
        $categories = Category::all();

        $query = Recipe::query();

        if ($request->has('category') && !empty($request->category)) {
            $query->where('category_id',$request->category);
        }

        $recipes = $query->get();

        return view('recips', compact('categories','recipes'));
    }

    public function storeRecipe(Request $request)
    {
      
        $validatedData = $request->validate([
            'author_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('recipes', 'public');
        } else {
            $imagePath = null;
        }

        Recipe::create([
            'author_name' => $validatedData['author_name'],
            'title' => $validatedData['title'], 
            'description' => $validatedData['description'],
            'image_url' => $imagePath,
            'category_id' => $validatedData['category_id'],
        ]);

        return redirect()->back()->with('success', 'Recipe added successfully!');
    }

}