<x-app-layout>

    <div class="container grid px-6 mx-auto">
        <div class="flex justify-between">
            <div>
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Create Student Profile
                </h2>
            </div>

            <div>
                <a class="block px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    href="{{ route('student.index') }}">
                    Back
                </a>
            </div>
        </div>


        <div class="w-11/12 m-auto px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form action="{{ route('student.store') }}" method="post"
                class="grid md:grid-cols-2 sm:grid-cols-1 gap-x-6 gap-y-4">
                @csrf

                <label class="block text-sm ">
                    <span class="text-gray-700 dark:text-gray-400">
                        Name
                    </span>
                    <input type="text"
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
                <label class="block text-sm ">
                    <span class="text-gray-700 dark:text-gray-400">
                        Roll
                    </span>
                    <input type="number"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input
                        {{ $errors->has('roll') ? 'border-red-600' : '' }}"
                        value="{{ old('roll') }}" name="roll" placeholder="roll">
                        {{-- Errors --}}
                        @error('roll')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                        @enderror
                    </label>
                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">
                            class
                        </span>
                        <select class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="classes_id" id="classes_id">
                            
                            <option value="">Select Class</option>
                            @foreach ($classes as $id => $class)
                                <option value="{{ $id }}"
                                    {{ (old('classes_id') == $id) ? 'selected' : ''}}
                                >{{ $class }}</option>
                            @endforeach
                        </select>

                        {{-- Errors --}}
                        @error('classes_id')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>
                <label class="block text-sm ">
                    <span class="text-gray-700 dark:text-gray-400">
                        Email
                    </span>
                    <input type="email"
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
                <label class="block text-sm ">
                    <span class="text-gray-700 dark:text-gray-400">
                        Phone
                    </span>
                    <input type="tel"
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
                <label class="block text-sm ">
                    <span class="text-gray-700 dark:text-gray-400">
                        age
                    </span>

                    <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input datepicker="" type="text" name="age" 
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple pl-10 dark:text-gray-300 dark:focus:shadow-outline-gray form-input
                            {{ $errors->has('age') ? 'border-red-600' : '' }}"
                            placeholder="Select Age"
                            datepicker-autohide 
                            value="{{ old('age') }}"
                            datepicker-format="dd/mm/yyyy">
                    </div>
                    {{-- Errors --}}
                    @error('age')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm ">
                    <span class="text-gray-700 dark:text-gray-400">
                        Father's Name
                    </span>
                    <input type="text"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input
                        {{ $errors->has('fathers_name') ? 'border-red-600' : '' }}"
                        value="{{ old('fathers_name') }}" name="fathers_name" placeholder="Mr. Rahman">
                        {{-- Errors --}}
                    @error('fathers_name')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm ">
                    <span class="text-gray-700 dark:text-gray-400">
                        Mother's Name
                    </span>
                    <input type="text"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input
                        {{ $errors->has('mothers_name') ? 'border-red-600' : '' }}"
                        value="{{ old('mothers_name') }}" name="mothers_name" placeholder="Mrs. Mahmuda">
                    {{-- Errors --}}
                    @error('mothers_name')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm mb-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        Address
                    </span>
                    <textarea type="address" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="address" placeholder="Address">{{ old('address') }}</textarea>
                    {{-- Errors --}}
                    @error('address')
                    <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                        @enderror
                    </label>
                    <label class="block text-sm ">
                        <span class="text-gray-700 dark:text-gray-400">
                            Gender
                        </span>
    
                        <div class="flex ">
                            <div class="flex items-center mr-4">
                                <input id="inline-radio" type="radio" value="1" name="gender"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="inline-radio"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Male</label>
                            </div>
                            <div class="flex items-center mr-4">
                                <input id="inline-2-radio" type="radio" value="2" name="gender"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="inline-2-radio"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Female</label>
                            </div>
                            <div class="flex items-center mr-4">
                                <input checked="" id="inline-checked-radio" type="radio" value="3"
                                    name="gender"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="inline-checked-radio"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Other</label>
                            </div>
                        </div>
    
                        {{-- Errors --}}
                        @error('gender')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>
                <label class="block text-sm mb-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        Group
                    </span>
                    <select class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        name="group" id="group">
                        <option value="1">Science</option>
                        <option value="2">Commerce</option>
                        <option value="3">Arts</option>
                    </select>
                    {{-- Errors --}}
                    @error('group')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>

                <label class="block text-sm mb-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        Session
                    </span>
                    <input type="number"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input
                        {{ $errors->has('session') ? 'border-red-600' : '' }}"
                        value="{{ old('session') }}" name="session" placeholder="2018">
                    {{-- Errors --}}
                    @error('session')
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






                <div class="inline text-sm mb-4">
                    <button type="submit"
                        class="flex mx-auto mt-3 px-4 py-2 text-lg font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Submit
                    </button>
                </div>
            </form>
        </div>


    </div>
    @section('script')
        {{-- <script>
            $(document).ready(function() {
                $('#classes_id').select2({
                    placeholder: 'Select a Class',
                    // theme: "classic"

                });
            });
        </script> --}}

        <script src="https://unpkg.com/flowbite@1.5.2/dist/datepicker.js"></script>
    @endsection
</x-app-layout>
