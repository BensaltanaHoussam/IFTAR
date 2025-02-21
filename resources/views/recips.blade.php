@extends('layouts.master')

@section('main')

    <div>
        <!-- Hero Section -->
        <div style="background-image: url('{{ asset('assets/img/iftar5.jpg') }}')" class=" bg-cover bg-center rounded-b-2xl text-white">
            <div class="container flex flex-col justify-center items-center mx-auto px-4 py-16">
                <h1 class="text-4xl md:text-6xl font-bold mb-4">Ramadan Recipes</h1>
                <p class="text-xl opacity-90 mb-8">Discover and share your favorite Ramadan recipes</p>

                <!-- Search Bar -->
                <div class="relative max-w-2xl">
                    <input type="text" placeholder="Search recipes..." class="w-full px-6 py-4 rounded-lg bg-white/10 backdrop-blur-sm border border-white/20 
                               placeholder-white/70 text-white focus:outline-none focus:ring-2 focus:ring-white/50">
                    <svg class="w-6 h-6 absolute right-4 top-1/2 transform -translate-y-1/2 text-white/70" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div style="background-image: url('{{ asset('assets/img/bg2.jpg') }}')" class="container bg-cover bg-center mx-auto px-4 py-8">
            <!-- Category Filter & Add Recipe Button -->
            <div class="flex flex-wrap items-center justify-between px-8 gap-4 mb-8">
                <div class="flex flex-wrap gap-4">
                    <button class="px-6 py-2 rounded-full bg-yellow-500 text-white">All Recipes</button>
                    <button class="px-6 py-2 rounded-full bg-white border border-gray-200 hover:border-yellow-500">Iftar
                        Special</button>
                    <button
                        class="px-6 py-2 rounded-full bg-white border border-gray-200 hover:border-yellow-500">Entrées</button>
                    <button class="px-6 py-2 rounded-full bg-white border border-gray-200 hover:border-yellow-500">Plats
                        Principaux</button>
                    <button
                        class="px-6 py-2 rounded-full bg-white border border-gray-200 hover:border-yellow-500">Desserts</button>
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
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Recipe Card 1 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <img src="/api/placeholder/400/250" alt="Recipe" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm">Iftar</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Moroccan Harira Soup</h3>
                        <p class="text-gray-600 mb-4">Traditional Ramadan soup with lentils and chickpeas</p>
                        <div class="flex items-center gap-2 text-sm text-gray-500">
                            <img src="/api/placeholder/32/32" alt="Author" class="w-8 h-8 rounded-full">
                            <span>By Chef Amina</span>
                        </div>
                    </div>
                </div>

                <!-- Recipe Card 2 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <img src="/api/placeholder/400/250" alt="Recipe" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm">Dessert</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Baklava</h3>
                        <p class="text-gray-600 mb-4">Sweet pastry with layers of nuts and honey</p>
                        <div class="flex items-center gap-2 text-sm text-gray-500">
                            <img src="/api/placeholder/32/32" alt="Author" class="w-8 h-8 rounded-full">
                            <span>By Chef Hassan</span>
                        </div>
                    </div>
                </div>

                <!-- Recipe Card 3 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <img src="/api/placeholder/400/250" alt="Recipe" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm">Iftar</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Date & Almond Smoothie</h3>
                        <p class="text-gray-600 mb-4">Perfect drink to break your fast</p>
                        <div class="flex items-center gap-2 text-sm text-gray-500">
                            <img src="/api/placeholder/32/32" alt="Author" class="w-8 h-8 rounded-full">
                            <span>By Nadia K.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Recipe Modal -->
        <div id="addRecipeModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4">
            <div class="bg-white rounded-xl max-w-2xl w-full p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold">Add New Recipe</h2>
                    <button onclick="document.getElementById('addRecipeModal').classList.add('hidden')"
                        class="text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <form class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Author Name</label>
                        <input type="text"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Recipe Title</label>
                        <input type="text"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                        <select
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                            <option>Iftar Special</option>
                            <option>Entrées</option>
                            <option>Plats Principaux</option>
                            <option>Desserts</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea rows="3"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-transparent"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Recipe Image</label>
                        <input type="file"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                    </div>
                    <button type="submit" class="w-full bg-yellow-500 text-white py-2 px-4 rounded-lg hover:bg-yellow-600">
                        Add Recipe
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection