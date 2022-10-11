<x-app-layout>
    <div class="container grid px-6 mx-auto">
        <div class="flex justify-between">
            <div>
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    event
                </h2>
            </div>

            <div>
                <a class="block px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    href="{{ route('event.index') }}">
                    All Event
                </a>
            </div>
        </div>


        <div class="w-2/4 m-auto px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form action="{{ route('event.store') }}" method="post">
                @csrf
                <!-- Invalid input -->
                <label class="block text-sm mb-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        Event Name
                    </span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input
                        {{ $errors->has('event_name') ? 'border-red-600' : '' }}"
                        value="{{ old('event_name') }}" name="event_name" placeholder="Event Name">
                    {{-- Errors --}}
                    @error('event_name')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>

                <label class="block text-sm mb-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        Description
                    </span>
                    <textarea type="description" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="description" placeholder="Description">{{ old('description') }}</textarea>
                    {{-- Errors --}}
                    @error('description')
                    <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                        @enderror
                    </label>


                <label class="block text-sm ">
                    <span class="text-gray-700 dark:text-gray-400">
                        Date
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
                        <input datepicker="" type="text" name="date" 
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple pl-10 dark:text-gray-300 dark:focus:shadow-outline-gray form-input
                            {{ $errors->has('date') ? 'border-red-600' : '' }}"
                            placeholder="Select Date"
                            datepicker-autohide 
                            value="{{ old('date') }}"
                            autocomplete="off"
                            datepicker-format="dd-mm-yyyy">
                    </div>
                    {{-- Errors --}}
                    @error('date')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <button type="submit"
                    class="block mx-auto mt-3 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:bg-purple-800 focus:border focus:outline-none focus:shadow-outline-purple">
                    Submit
                </button>
            </form>
        </div>


    </div>
    @section('script')
    
    
    <script src="https://unpkg.com/flowbite@1.5.2/dist/datepicker.js"></script>
    @endsection
</x-app-layout>
