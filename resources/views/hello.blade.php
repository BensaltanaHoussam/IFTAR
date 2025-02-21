@extends('layouts.master')

@section('main')


    <div style="background-image: url('{{ asset('assets/img/walpaper.jpg') }}')"
        class="w-full  min-h-[600px] mx-auto relative bg-center bg-cover bg-no-repeat py-8">
        <div class="w-[90%] mx-auto grid md:grid-cols-2 gap-8 items-center">
            <!-- Left Side - Hero Content -->
            <div class="text-white flex flex-col gap-4">
                <h1 class="text-4xl font-bold xl:text-7xl lg:text-6xl md:text-5xl">Ramadan</h1>
                <h1 class="text-4xl font-bold xl:text-6xl lg:text-6xl md:text-5xl">
                    <span class="text-yellow-200">Karim</span>
                </h1>
                <p class="text-lg lg:text-xl my-4">
                    IFTAR Your Ultimate Ramadan Hub: Daily Iftar & Suhoor Recipes, Posts, and Live Updates to Enrich Your
                    Ramadan Experience!
                </p>

                <!-- Search Bar -->
                <form method="GET" action="" class="relative w-full max-w-xl">
                    <input type="text" name="term" placeholder="Search For your iftar sohour ..."
                        class="w-full px-4 py-3 text-white placeholder-gray-300 transition-all duration-300 border rounded-lg outline-none bg-white/10 border-white/20 focus:border-white backdrop-blur-sm">
                    <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-5 h-5 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </button>
                </form>
                <div id="searchResults" class="mt-2"></div>
            </div>

            <!-- Right Side - Compact Form -->
            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6 border border-white/20">
                <form method="POST" action="{{ route('store.post') }}" class="flex flex-col gap-4"
                    enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="author_name" class="block text-white text-sm mb-1">Author Name</label>
                        <input type="text" name="author_name" id="author_name" placeholder="Enter author's name"
                            class="w-full px-4 py-2 text-white placeholder-gray-300 transition-all duration-300 border rounded-lg outline-none bg-white/10 border-white/20 focus:border-white">
                    </div>

                    <div>
                        <label for="title" class="block text-white text-sm mb-1">Post Title</label>
                        <input type="text" name="title" id="title" placeholder="Enter post title"
                            class="w-full px-4 py-2 text-white placeholder-gray-300 transition-all duration-300 border rounded-lg outline-none bg-white/10 border-white/20 focus:border-white">
                    </div>

                    <div>
                        <label for="content" class="block text-white text-sm mb-1">Post Content</label>
                        <textarea name="content" id="content" rows="3" placeholder="Enter post content"
                            class="w-full px-4 py-2 text-white placeholder-gray-300 transition-all duration-300 border rounded-lg outline-none bg-white/10 border-white/20 focus:border-white"></textarea>
                    </div>

                    <div>
                        <label for="image" class="block text-white text-sm mb-1">Post Image</label>
                        <input type="file" name="image" id="image"
                            class="w-full px-4 py-2 text-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:bg-white/20 file:text-white hover:file:bg-white/30">
                    </div>

                    <button type="submit"
                        class="w-full px-6 py-2 mt-2 bg-yellow-200 text-gray-800 rounded-lg hover:bg-yellow-300 transition-colors font-medium">
                        Submit Post
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- Previous hero section remains the same -->

    <div style="background-image: url('{{ asset('assets/img/bg14.jpg') }}')" class="bg-cover bg-center bg-black">
        <div class="flex flex-wrap gap-8 px-4 justify-center py-12">
            @foreach($posts as $post)
                <div class="w-[800px] bg-black border border-yellow-300 rounded-lg shadow-2xl mb-6">
                    <!-- Post Header -->
                    <div class="p-4 flex items-center gap-3 text-white">
                        <img src="{{ asset('assets/img/profile.jpg') }}" alt="User Avatar"
                            class="rounded-full w-10 h-10 object-cover">
                        <div>
                            <h3 class="font-semibold">{{ $post->author_name }}</h3>
                            <span class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                    </div>

                    <!-- Post Content -->
                    <div class="px-4 pb-3">
                        <h4 class="font-semibold mb-2 text-white">{{ $post->title }}</h4>
                        <p class="text-gray-300">{{ $post->content }}</p>
                    </div>

                    <!-- Post Image -->
                    @if($post->image_url)
                        <img class="object-contain h-[360px] w-full" src="{{ asset('storage/' . $post->image_url) }}"
                            alt="Post Image">
                    @else
                        <img class="object-contain h-[360px] w-full" src="{{ asset('assets/img/default-image.jpg') }}"
                            alt="No Post Image">
                    @endif

                    <!-- Interaction Buttons -->
                    <div class="p-4 flex items-center gap-6 border-t border-gray-700">
                        <button class="flex items-center gap-2 text-white hover:text-blue-400">
                            <i class="ri-heart-line"></i>
                            <span>245</span> Likes
                        </button>
                        <div class="flex items-center gap-2 text-gray-400">
                            <i class="ri-message-2-line"></i>
                            {{ $post->comments ? $post->comments->count() : '0' }} Comments
                        </div>
                        <button class="flex items-center gap-2 text-white hover:text-blue-400">
                            <i class="ri-share-line"></i>
                            Share
                        </button>
                    </div>

                    <!-- Comments Section -->
                    <div class="border-t bg-black p-4">
                        <!-- Comment Form -->
                        <form method="POST" action="{{ route('comment.post') }}" class="mb-4">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <div class="flex gap-2 mb-3">
                                <input type="text" name="author_name" placeholder="Your name"
                                    class="flex-1 px-3 py-2 border rounded-lg bg-gray-700 text-white focus:outline-none focus:border-yellow-400"
                                    required>
                                <input type="text" name="content" placeholder="Write a comment..."
                                    class="flex-1 px-3 py-2 border rounded-lg bg-gray-700 text-white focus:outline-none focus:border-yellow-400"
                                    required>
                                <button type="submit" class="px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-black">
                                    Post
                                </button>
                            </div>
                        </form>

                        <!-- Comments List -->
                        <div class="space-y-3 h-[100px] overflow-y-scroll scrollbar-hidden">
                            @if($post->comments && $post->comments->count() > 0)
                                @foreach($post->comments as $comment)
                                    <div class="bg-gray-900 p-3 rounded-lg shadow-sm">
                                        <div class="font-semibold text-sm text-white">{{ $comment->author_name }}</div>
                                        <div class="text-gray-300">{{ $comment->content }}</div>
                                        <div class="text-xs text-gray-500 mt-1">{{ $comment->created_at->diffForHumans() }}</div>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-gray-500 text-center py-2">No comments yet. Be the first to comment!</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection