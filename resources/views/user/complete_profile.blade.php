@extends('dashboard')


@section("content")
   

    <div class="max-w-md mx-auto mt-8">

        <div class="max-w-md w-full bg-white p-6 rounded-lg shadow ">

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div x-data="{ show: true }" x-show="show"
                        class="mt-4 rounded-lg bg-red-50 border border-red-200 px-4 py-3 text-sm text-red-700 relative">
                        <button type="button" @click="show = false"
                            class="absolute top-2 right-2 text-red-500 hover:text-red-700 font-bold">
                            &times;
                        </button>
                        <span class="flex items-center gap-1">
                            <span class="material-icons text-red-500 text-base">error</span>
                            {{ $error }}
                        </span>
                    </div>
                @endforeach
            @endif
            <h2 class="text-xl font-semibold mb-4 text-center">Complete Profile</h2>
            <form id="formid" method="post" action="{{ route('user.update', $users->id) }}" enctype="multipart/form-data">
                @csrf
                @method("put")
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                    <input type="text" name="name" id="nameInput" value="{{  old("name", $users['name']) }}"
                        placeholder="Enter name" disabled
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" />
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input name="email" id="emailInput" type="email" value="{{ old("email", $users['email']) }}"
                        placeholder="Enter email" disabled
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" />
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Age</label>
                    <input name="age" type="number" id="ageInput" value="{{ old("age", $users['age'])  }}"
                        placeholder="Enter age"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" />
                </div>

                <div class="mb-4">
                    <label for="date" class="block text-sm font-medium text-gray-700 mb-2">
                        Date Of Birth
                    </label>
                    <input type="date" id="date" value="{{ old("date_of_birth", $users['date_of_birth'])  }}"
                        name="date_of_birth"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                </div>


                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                    <select name="gender"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="{{ old("gender") }}">Select gender</option>
                        <option {{ $users->gender == 'Male' ? 'selected' : '' }}>Male</option>
                        <option {{ $users->gender == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
                <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Select cities </label>
                    <select name="cities[]" class="select2" multiple>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}" {{ in_array($city->id, $users->cities->pluck('id')->toArray()) ? 'selected' : '' }}>
                                {{ $city->name }}
                            </option>
                        @endforeach
                    </select>
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
            
                
               
                <div class="flex justify-end mt-3 gap-2">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Update User
                    </button>
                </div>
            </form>

        </div>

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