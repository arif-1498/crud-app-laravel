<x-app-layout>
    <div class="min-h-screen flex">
    <aside class="fixed top-0  left-0 h-screen w-1/4 bg-gray-700 text-gray-100 flex flex-col">
        <div class="px-6 py-5 text-xl font-bold border-b border-gray-800">
            Dashboard
        </div>
        <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 rounded-lg px-4 py-2 text-sm hover:bg-gray-800 transition">
                <span class="material-icons">article</span>
                Posts
            </a>
            <a href="{{ route('post.create') }}" class="flex items-center gap-3 rounded-lg px-4 py-2 text-sm hover:bg-gray-800 transition">
                <span class="material-icons">post_add</span>
                Create Post
            </a>
            <a href="#" class="flex items-center gap-3 rounded-lg px-4 py-2 text-sm hover:bg-gray-800 transition">
                <span class="material-icons">edit</span>
                Edit Post
            </a>
            <a href="{{ route('user.posts') }}" class="flex items-center gap-3 rounded-lg px-4 py-2 text-sm hover:bg-gray-800 transition">
                <span class="material-icons">account_box</span>
                My Posts
            </a>
             <a href="{{ route('users.index') }}" class="flex items-center gap-3 rounded-lg px-4 py-2 text-sm hover:bg-gray-800 transition">
                <span class="material-icons">people</span>
                All users
            </a>
            <a href="{{ route('user.edit', auth()->user()->id) }}" class="flex items-center gap-3 rounded-lg px-4 py-2 text-sm hover:bg-gray-800 transition">
                <span class="material-icons">badge</span>
                Complete Profile
            </a>

        </nav>
    </aside>

    <main class="ml-[25%] w-3/4 flex-1 bg-gray-100 p-6 min-h-screen">
        @yield('content')
    </main>

</div>

</x-app-layout>
