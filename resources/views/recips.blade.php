@extends('layouts.master')

@section('main')

    <div>
        <!-- Hero Section -->
        <div style="background-image: url('{{ asset('assets/img/bg14.jpg') }}')" class="bg-cover rounded-b-2xl text-white">
            <div class="container flex flex-col justify-center items-center mx-auto px-4 py-16">
                <h1 class="text-4xl md:text-6xl font-bold mb-4 text-white">Ramadan Recipes</h1>
                <p class="text-xl opacity-90 mb-8 text-gray-300">Discover and share your favorite Ramadan recipes</p>

                <!-- Search Bar -->
                <div class="relative max-w-2xl">
                    <input type="text" placeholder="Search recipes..."
                        class="w-full px-6 py-4 rounded-lg bg-gray-800 backdrop-blur-sm border border-gray-700 placeholder-gray-400 text-white focus:outline-none focus:ring-2 focus:ring-white/50">
                    <svg class="w-6 h-6 absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div style="background-image: url('{{ asset('assets/img/bg14.jpg') }}')"
            class="container bg-center mx-auto px-4 py-8 bg-gray-900">
            <!-- Category Filter & Add Recipe Button -->
            <div class="flex flex-wrap items-center justify-between px-8 gap-4 mb-8">
                <div class="flex flex-wrap gap-4">
                    <a href="/iftar" class="px-6 py-2 rounded-full bg-yellow-500 text-white">All Recipes</a>
                    @foreach ($categories as $category)
                        <a href="/iftar?category={{$category->id}}"
                            class="px-6 py-2 rounded-full cursor-pointer bg-gray-800 border border-gray-700 hover:border-yellow-500 text-white">{{$category->name}}</a>
                    @endforeach
                </div>
                <button onclick="document.getElementById('addRecipeModal').classList.remove('hidden')"
                    class="px-6 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Recipe
                </button>
            </div>

            <!-- Recipe Grid -->
            <div class="container mx-auto px-4 py-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($recipes as $recipe)
                        <div
                            class="bg-black border border-yellow-400 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 overflow-hidden group transform hover:-translate-y-2">
                            <!-- Image Container with Overlay -->
                            <div class="relative overflow-hidden h-72">
                                <img src="{{ $recipe->image_url ? asset('storage/' . $recipe->image_url) : '/api/placeholder/400/250' }}"
                                    alt="{{ $recipe->title }}"
                                    class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                                <!-- Category Badge -->
                                <div class="absolute top-4 left-4">
                                    <span
                                        class="px-4 py-2 bg-yellow-400 text-yellow-900 rounded-full text-sm font-medium shadow-lg">
                                        {{ $recipe->category ? $recipe->category->name : 'Uncategorized' }}
                                    </span>
                                </div>
                            </div>

                            <!-- Content Container -->
                            <div class="p-8">
                                <!-- Title with hover effect -->
                                <h3
                                    class="text-2xl font-bold mb-4 group-hover:text-yellow-600 transition-colors duration-300 text-white">
                                    {{ $recipe->title }}
                                </h3>

                                <!-- Description with line clamp -->
                                <p class="text-gray-400 mb-6 line-clamp-3 text-lg">
                                    {{ $recipe->description }}
                                </p>

                                <!-- Author Section -->
                                <div class="flex items-center gap-4 border-t pt-6 text-gray-400">
                                    <img src="{{ asset('assets/img/profile.jpg') }}" alt="{{ $recipe->author_name }}"
                                        class="w-12 h-12 rounded-full ring-2 ring-yellow-400 p-[2px]">
                                    <div class="flex flex-col">
                                        <span class="font-medium text-white">{{ $recipe->author_name }}</span>
                                        <span class="text-sm text-gray-500">Recipe Creator</span>
                                    </div>

                                    <!-- View Recipe Button -->
                                    <button class="ml-auto bg-yellow-50 hover:bg-yellow-100 text-yellow-600 px-4 py-2 rounded-xl 
                                             transition-all duration-300 flex items-center gap-2 group">
                                        View Recipe
                                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

        <!-- Add Recipe Modal -->
        <div id="addRecipeModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4">
            <div class="bg-gray-800 rounded-xl max-w-2xl w-full p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold text-white">Add New Recipe</h2>
                    <button onclick="document.getElementById('addRecipeModal').classList.add('hidden')"
                        class="text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <form action="{{ route('add.recipe') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Author Name</label>
                        <input type="text" name="author_name"
                            class="w-full px-4 py-2 border rounded-lg bg-gray-700 text-white focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Recipe Title</label>
                        <input type="text" name="title"
                            class="w-full px-4 py-2 border rounded-lg bg-gray-700 text-white focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Category</label>
                        <select name="category_id"
                            class="w-full px-4 py-2 border rounded-lg bg-gray-700 text-white focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Description</label>
                        <textarea name="description" rows="3"
                            class="w-full px-4 py-2 border rounded-lg bg-gray-700 text-white focus:ring-2 focus:ring-yellow-500 focus:border-transparent"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Recipe Image</label>
                        <input type="file" name="image"
                            class="w-full px-4 py-2 border rounded-lg bg-gray-700 text-white focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                    </div>

                    <button type="submit" class="w-full bg-yellow-500 text-white py-2 px-4 rounded-lg hover:bg-yellow-600">
                        Add Recipe
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection