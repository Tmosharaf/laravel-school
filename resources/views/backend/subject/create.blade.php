<x-app-layout>
    <div class="container grid px-6 mx-auto">
        <div class="flex justify-between">
            <div>
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Subject
                </h2>
            </div>

            <div>
                <a class="block px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    href="{{ route('subject.index') }}">
                    All Subject
                </a>
            </div>
        </div>


        <div class="w-2/4 m-auto px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form action="{{ route('subject.store') }}" method="post">
                @csrf
                <!-- Invalid input -->
                <label class="block text-sm mb-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        Subject Name
                    </span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input
                        {{ $errors->has('subject_name') ? 'border-red-600' : '' }}"
                        value="{{ old('subject_name') }}" name="subject_name" placeholder="Subject Name">
                    {{-- Errors --}}
                    @error('subject_name')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm mb-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        Subject code
                    </span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input
                        {{ $errors->has('subject_code') ? 'border-red-600' : '' }}"
                        value="{{ old('subject_code') }}" name="subject_code" placeholder="Subject code">
                    {{-- Errors --}}
                    @error('subject_code')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm mb-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        Subject Class
                    </span>
                    <select
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        name="classes_id" id="class_select">
                        {{-- <option value="">Select Class</option> --}}
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>

                </label>
                <button type="submit"
                    class="block mx-auto mt-3 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:bg-purple-800 focus:border focus:outline-none focus:shadow-outline-purple">
                    Submit
                </button>
            </form>
        </div>


    </div>
    @section('script')
        <script>
            $(document).ready(function() {
                $('#class_select').select2({
                    // placeholder: 'Select a Class',
                    theme: "classic"

                });
            });
        </script>
    @endsection
</x-app-layout>
