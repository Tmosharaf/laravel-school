<x-app-layout>
    <div class="container grid px-6 mx-auto">
        <div class="flex justify-between">
            <div>
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Teacher
                </h2>
            </div>

            <div>
                <a class="block px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    href="{{ route('teacher.index') }}">
                    All Teacher
                </a>
            </div>
        </div>


        <div class="w-2/4 m-auto px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form action="{{ route('teacher.store') }}" method="post">
                @csrf
                <!-- Invalid input -->
                <label class="block text-sm mb-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        Name
                    </span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input
                        {{ $errors->has('name') ? 'border-red-600' : '' }}"
                        value="{{ old('name') }}" name="name" placeholder="Name">
                    {{-- Errors --}}
                    @error('name')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm mb-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        Email
                    </span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input
                        {{ $errors->has('email') ? 'border-red-600' : '' }}"
                        value="{{ old('email') }}" name="email" placeholder="Email">
                    {{-- Errors --}}
                    @error('email')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm mb-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        Password
                    </span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input
                        {{ $errors->has('password') ? 'border-red-600' : '' }}"
                        value="{{ old('password') }}" name="password" placeholder="Password">
                    {{-- Errors --}}
                    @error('password')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm mb-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        Confirm Password
                    </span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input
                        {{ $errors->has('password_confirmation') ? 'border-red-600' : '' }}"
                        value="{{ old('password_confirmation') }}" name="password_confirmation" placeholder="Confirm Password">
                    {{-- Errors --}}
                    @error('password_confirmation')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm mb-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        Phone
                    </span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input
                        {{ $errors->has('phone') ? 'border-red-600' : '' }}"
                        value="{{ old('phone') }}" name="phone" placeholder="Phone">
                    {{-- Errors --}}
                    @error('phone')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm mb-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        Address
                    </span>
                    <textarea class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        name="address" placeholder="Address">{{ old('address') }}</textarea>
                    {{-- Errors --}}
                    @error('address')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm mb-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        education
                    </span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        value="{{ old('education') }}" name="education" placeholder="education">
                    {{-- Errors --}}
                    @error('education')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                
                <label class="block text-sm mb-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        experience
                    </span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        value="{{ old('experience') }}" name="experience" placeholder="experience">
                    {{-- Errors --}}
                    @error('experience')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm mb-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        description
                    </span>
                    <textarea class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        name="description" placeholder="description">{{ old('description') }}</textarea>
                    {{-- Errors --}}
                    @error('description')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                
                <label class="block text-sm mb-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        class teacher
                    </span>
                    <select class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        name="class_teacher" id="class_teacher">
                        <option value="">Select Class Teacher</option>
                        @foreach ($classes as $id => $class)
                            <option value="{{ $class }}">{{ $class }}</option>
                        @endforeach
                    </select>
                    {{-- Errors --}}
                    @error('class_teacher')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                
                <label class="block text-sm mb-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        Image
                    </span>
                    <input type="file" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        name="image">
                    {{-- Errors --}}
                    {{-- Errors --}}
                    @error('image')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                





                <button type="submit"
                    class="block mx-auto mt-3 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Submit
                </button>
            </form>
        </div>


    </div>
    @section('script')
        <script>
            $(document).ready(function() {
                $('#class_teacher').select2({
                    placeholder: 'Select a Class',
                    // theme: "classic"

                });
            });
        </script>
    @endsection
</x-app-layout>
