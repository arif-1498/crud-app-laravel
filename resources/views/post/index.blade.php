@extends('dashboard')

@section("content")

  <div class="max-w-md mx-auto mt-8 bg-indigo-100 ">
    <form class="flex" method="get" action="{{ route('post.index') }}">
      <input type="text" placeholder="Search..." name="search" value=""
        class="w-full px-4 py-2 rounded-l-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
      <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-r-lg hover:bg-blue-600 transition">
        Search
      </button>
    </form>
  </div>

  @foreach ($posts as $post)
   
    
    <div class="max-w-lg mx-auto bg-blue-100 border rounded border-gray-300 p-8 my-12">

      <h2 class="text-2xl font-serif text-gray-800 mb-6 tracking-wide text-center">
        {{ $post->title }}
      </h2>
      <div class="mb-8">
        @if ($post->image)
        <img src="{{ asset('storage/post_images/' . $post->image->name) }}" alt="Badshahi Mosque at sunset"
          class="w-full h-auto border border-gray-400 object-cover" />
      
        @else
        <p class="w-full h-100 border border-gray-400 flex justify-centre object-cover">No image </p>
        
        @endif
        
      </div>

      <div class="text-gray-800 leading-relaxed text-lg font-light mb-10 px-4">
        <p>{{ $post->body }}</p>
      </div>
      <div class="space-y-6">
        <div>
          <p class="text-sm uppercase tracking-wider text-gray-600 mb-1">Posted by</p>
          <p class="text-2xl font-medium text-gray-900">{{ $post->user->name }}</p>
          
        </div>
      </div>
      <div class="border-t border-gray-900 pt-6">
        @forelse ($post->comments as $comment)
          <div class="text-sm text-gray-700 mb-4">

            <span class="font-medium text-gray-900">{{ $comment->user->name }}</span><br>
            {{ $loop->count == 0 ? 'No any comment yet' : $comment->body }}
          </div>
        @empty
          <p class="text-gray-500">No comments yet.</p>
        @endforelse

      </div>

      <form action="{{ route('comment.store') }}" method="post" class="mt-6">
        @csrf

        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <textarea name="body" placeholder="Leave a comment..." rows="2"
          class="w-full p-3 border border-gray-300 focus:outline-none focus:border-gray-400 text-gray-700 placeholder-gray-400 text-sm resize-none bg-white"></textarea>
        <div class="mt-3 text-right">
          <button type="submit" class="px-5 py-2 bg-gray-800 text-white text-sm hover:bg-gray-900 transition">
            Add comment
          </button>
        </div>
      </form>
    </div>
  @endforeach





@endsection