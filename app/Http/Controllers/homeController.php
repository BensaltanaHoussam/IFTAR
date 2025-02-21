<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Recipe;


use Illuminate\Http\Request;

class homeController extends Controller
{
   public function index(Request $request)
   {
      $posts = Post::with('comments')->latest()->get();
      return view('hello', compact('posts'));
   }

   public function statistiquesIndex(Request $request)
   {

      $totalComments = Comment::count();
      $totalPosts = Post::count();
      $totalRecipes = Recipe::count();

      return view('statistiques', compact('totalComments', 'totalPosts', 'totalRecipes'));
     
   }


   public function store(Request $request)
   {

      $request->validate([
         'author_name' => 'required|string|max:255',
         'title' => 'required|string|max:255',
         'content' => 'required|string|max:5000',
         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
      ]);


      $imagePath = null;
      if ($request->hasFile('image')) {
         $imagePath = $request->file('image')->store('images', 'public');
      }

      Post::create([
         'author_name' => $request->input('author_name'),
         'title' => $request->input('title'),
         'content' => $request->input('content'),
         'image_url' => $imagePath,
      ]);

      return redirect('/')->with('success', 'Post created successfully!');
   }

   public function addComment(Request $request)
   {

      $request->validate([
         'author_name' => 'required|string|max:255',
         'content' => 'required|string|max:255',
      ]);


      Comment::create([
         'post_id' => $request->input('post_id'),
         'author_name' => $request->input('author_name'),
         'content' => $request->input('content'),
      ]);

      return redirect('/')->with('success', 'comment created successfully!');
   }


}
