@extends('dashboard')

@section("content")

    <div class="max-w-lg mx-auto bg-white p-6 rounded-md shadow-md border border-gray-200">
        <h2 class="text-gray-800 font-bold mb-4 flex items-center gap-2 text-lg">
            <span class="material-icons text-2xl">post_add</span>
            Create Post
        </h2>

        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-base mb-2" for="title">Title</label>
                <input type="text" id="title" name="title" placeholder="Enter post title"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-base focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>


            <div class="mb-4">
                <label class="block text-gray-700 text-base mb-2" for="content">Content</label>
                <textarea id="content" name="body" rows="5" placeholder="Write something..."
                    class="w-full border border-gray-300 rounded px-3 py-2 text-base focus:outline-none focus:ring-2 focus:ring-blue-400 resize-none"></textarea>
            </div>

            <div class="mb-4">
                

                    <label class="block text-sm font-medium text-gray-700">
                        Upload Image
                    </label>

                    <!-- Preview Box -->
                    <div
                        class="relative w-full h-48 border-2 border-dashed rounded-lg bg-gray-50 flex items-center justify-center overflow-hidden">

                        <!-- Image -->
                        <img id="preview" class="hidden w-full h-full object-cover" alt="Preview">

                        <!-- Placeholder -->
                        <span id="placeholder" class="text-gray-400 text-sm">
                            No image selected
                        </span>

                        <!-- Remove Button -->
                        <button type="button" id="removeBtn" onclick="removeImage()"
                            class="hidden absolute top-2 right-2 bg-red-600 text-white text-xs px-2 py-1 rounded hover:bg-red-700">
                            ✕
                        </button>
                    </div>

                    <!-- File Input -->
                    <input type="file" name="image" accept="image/*" onchange="previewImage(event)" class="w-full text-sm text-gray-500
                      file:mr-4 file:py-2 file:px-4
                      file:rounded-lg file:border-0
                      file:bg-blue-50 file:text-blue-700
                      hover:file:bg-blue-100">
               

            </div>


            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-base flex items-center gap-2">
                <span class="material-icons text-[18px]">send</span>
                Post
            </button>
        </form>
    </div>

    <script>
function previewImage(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('preview');
    const placeholder = document.getElementById('placeholder');
    const removeBtn = document.getElementById('removeBtn');

    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.classList.remove('hidden');
        removeBtn.classList.remove('hidden');
        placeholder.classList.add('hidden');
    }
}

function removeImage() {
    const preview = document.getElementById('preview');
    const placeholder = document.getElementById('placeholder');
    const removeBtn = document.getElementById('removeBtn');
    const input = document.querySelector('input[type=file]');

    preview.src = '';
    preview.classList.add('hidden');
    removeBtn.classList.add('hidden');
    placeholder.classList.remove('hidden');
    input.value = '';
}
</script>



@endsection