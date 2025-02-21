@extends('layouts.master')

@section('main')
    <!-- Main Container -->
    <div class="min-h-screen bg-black py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-yellow-100 sm:text-5xl">Ramadan Statistics</h1>
                <p class="mt-4 text-lg text-gray-300">Tracking our community's engagement during the blessed month</p>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 mb-16">
                <!-- Posts Stats Card -->
                <div class="bg-black overflow-hidden shadow-xl rounded-lg border border-yellow-300/20">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 p-3 bg-yellow-300/10 rounded-md">
                                <svg class="w-6 h-6 text-yellow-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div class="ml-5">
                                <h3 class="text-lg font-medium text-gray-200">Total Posts</h3>
                                <div class="mt-1 text-3xl font-semibold text-yellow-100">{{$totalPosts}}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Comments Stats Card -->
                <div class="bg-black overflow-hidden shadow-xl rounded-lg border border-yellow-300/20">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 p-3 bg-yellow-300/10 rounded-md">
                                <svg class="w-6 h-6 text-yellow-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                                </svg>
                            </div>
                            <div class="ml-5">
                                <h3 class="text-lg font-medium text-gray-200">Total Comments</h3>
                                <div class="mt-1 text-3xl font-semibold text-yellow-100">{{$totalComments}}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recipes Stats Card -->
                <div class="bg-black overflow-hidden shadow-xl rounded-lg border border-yellow-300/20">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 p-3 bg-yellow-300/10 rounded-md">
                                <svg class="w-6 h-6 text-yellow-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <div class="ml-5">
                                <h3 class="text-lg font-medium text-gray-200">Total Recipes</h3>
                                <div class="mt-1 text-3xl font-semibold text-yellow-100">{{$totalRecipes}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- About Ramadan Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
                <div class="bg-black p-8 rounded-lg border border-yellow-300/20">
                    <h2 class="text-2xl font-bold text-yellow-100 mb-4">About Ramadan</h2>
                    <p class="text-gray-300 mb-4">Ramadan is the ninth month of the Islamic calendar and is observed by Muslims worldwide as a month of fasting, prayer, reflection and community. It commemorates the first revelation of the Quran to Prophet Muhammad.</p>
                    <p class="text-gray-300">During this blessed month, Muslims fast from dawn to sunset, engage in increased prayer and charitable acts, and strengthen community bonds through shared meals and worship.</p>
                </div>

                <div class="bg-black p-8 rounded-lg border border-yellow-300/20">
                    <h2 class="text-2xl font-bold text-yellow-100 mb-4">Community Guidelines</h2>
                    <ul class="text-gray-300 space-y-3">
                        <li>• Share your favorite Iftar and Suhoor recipes</li>
                        <li>• Engage respectfully with other community members</li>
                        <li>• Post tips for maintaining energy during fasting</li>
                        <li>• Share your Ramadan experiences and reflections</li>
                    </ul>
                </div>
            </div>

            <!-- Featured Content -->
            <div class="bg-black p-8 rounded-lg border border-yellow-300/20 mb-16">
                <h2 class="text-2xl font-bold text-yellow-100 mb-6">Featured Content</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="p-4 bg-black rounded-lg">
                        <h3 class="text-xl font-semibold text-yellow-100 mb-2">Popular Recipes</h3>
                        <p class="text-gray-300">Discover traditional and modern Ramadan recipes shared by our community.</p>
                    </div>
                    <div class="p-4 bg-black rounded-lg">
                        <h3 class="text-xl font-semibold text-yellow-100 mb-2">Spiritual Resources</h3>
                        <p class="text-gray-300">Access guides for prayer times, Quran readings, and spiritual reflection.</p>
                    </div>
                    <div class="p-4 bg-black rounded-lg">
                        <h3 class="text-xl font-semibold text-yellow-100 mb-2">Community Events</h3>
                        <p class="text-gray-300">Find local iftars, taraweeh prayers, and community gatherings.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection