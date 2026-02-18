@extends('dashboard')

@section("content")
<div class="container mx-auto px-4 py-6">
  <div class="flex flex-wrap -mx-4">
   <h1 class="text-3xl font-semibold mb-6 w-full">My Posts</h1>
    @foreach($user_posts as $user)
      @foreach($user->posts as $post)
       <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-4 mb-6">
      <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
         @if ($post->image)
        <img class="w-full h-48 object-cover" src="{{ asset('storage/post_images/' . $post->image->name) }}" alt="Post 1">
        @else
        <p class="w-full h-48 object-cover flex justify-center items-center"> No image </p>
        @endif
        
        <div class="p-4 flex flex-col flex-1">
          <h2 class="text-lg font-semibold text-gray-800">{{ $post->title }}</h2>
          <p class="mt-2 text-gray-600 text-sm line-clamp-3 flex-1">
            {{ $post->body }}
          </p>
          <div class="mt-4 flex items-center justify-between text-xs text-gray-500">
            
            <span>{{ $post->created_at->format('d M, Y') }}</span>
          </div>
          <a href="#" class="mt-4 text-indigo-600 hover:text-indigo-900 font-medium text-sm">Read More</a>
        </div>
      </div>
    </div>

        
      @endforeach
    @endforeach
   
    
  </div>
</div>

@endsection