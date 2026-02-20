@extends('dashboard')

@section("content")
<div class="overflow-x-auto ">
  <table class="min-w-full divide-y divide-gray-200 shadow rounded-lg">
    <thead class="bg-indigo-300">
      <tr>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Age</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gender</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">City</th>
        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
      @foreach($users as $user)
      <tr class=" bg-indigo-50 hover:bg-gray-50">
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $user->id }}</td>
        
        
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 flex items-center gap-3">
          <img class="h-10 w-10 rounded-full object-cover" 
               src="{{$user->image? asset('storage/profile_images/' . $user->image->name): asset('storage/assets/avator.png')}}"  
               alt="{{ $user->name }}">
          <span>{{ $user->name }}</span>
        </td>
        
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $user->email }}</td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $user->age ?? '-' }}</td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $user->gender ?? '-' }}</td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $user->cities->pluck('name')->join(', ') ?? '-' }}</td>
        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
          <a href="{{ route('user.edit', $user->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</a>
          <form action="{{ route('user.delete', $user->id) }}" method="POST" class="inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <div class="max-w-4xl mx-auto p-4">
  <!-- Statistics -->
  <div class="flex justify-between items-center mb-4 text-gray-700 text-sm">
    <div>
      Showing <span class="font-semibold">{{ $users->firstItem() }}</span> to 
      <span class="font-semibold">{{ $users->lastItem() }}</span> of 
      <span class="font-semibold">{{ $users->total() }}</span> users
    </div>
    <div class="flex items-center space-x-2">
      @if($users->onFirstPage())
        <button class="px-3 py-1 bg-gray-200 rounded cursor-not-allowed" disabled>Prev</button>
      @else
        <a href="{{ $users->previousPageUrl() }}" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">Prev</a>
      @endif

      @if($users->hasMorePages())
        <a href="{{ $users->nextPageUrl() }}" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">Next</a>
      @else
        <button class="px-3 py-1 bg-gray-200 rounded cursor-not-allowed" disabled>Next</button>
      @endif
    </div>
  </div>

  <!-- Pagination Numbers -->
  <div class="flex justify-center space-x-1">
    @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
      @if($page == $users->currentPage())
        <span class="px-3 py-1 rounded border border-gray-300 bg-blue-500 text-white">{{ $page }}</span>
      @else
        <a href="{{ $url }}" class="px-3 py-1 rounded border border-gray-300 bg-white hover:bg-gray-100">{{ $page }}</a>
      @endif
    @endforeach
  </div>
</div>

  
  
</div>

  
</div>



@endsection
