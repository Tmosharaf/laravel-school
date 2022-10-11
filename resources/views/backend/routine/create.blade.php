<x-app-layout>
    <div class="container grid px-6 mx-auto">
        <div class="flex justify-between">
            <div>
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Routine: Class <span class="text-green-600">{{ $class->name }}</span>
                </h2>
            </div>

            <div>
                <a class="block px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    href="{{ route('routine.index') }}">
                    All Class
                </a>
            </div>
        </div>



        <div class="flex">
            <div class="w-8/12  mr-4 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap mb-6">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Time</th>
                                <th class="px-4 py-3">Subject Name</th>
                                <th class="px-4 py-3">Teacher</th>
                                <th class="px-4 py-3">Days</th>
                                <th class="px-4 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($routines as $routine)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <p class="font-medium">{{ $routine->time }}</p>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <p class="font-medium">{{ $routine->subject->subject_name }}</p>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <a href=""
                                            class="px-2 py-1 font-semibold 
                                            leading-tight text-green-700 
                                            bg-green-100 rounded-full 
                                            dark:bg-green-700 
                                            dark:text-green-100">
                                            {{ $routine->teacher->name ?? '' }}
                                        </a>
                                    </td>
                                    <td class="px-4 py-3 text-sm break-all">
                                        <span>{{ $routine->day }}</span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <form action="{{ route('routine.destroy', $routine) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                aria-label="Delete">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="w-4/12 m-auto px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <form action="{{ route('routine.store') }}" method="post">
                    @csrf
                    <!-- Invalid input -->
                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">
                            Class Name
                        </span>
                        <select id="large" name="classes_id"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            <option selected>Choose a Class</option>
                            <option value="{{ $class->id }}" selected>{{ $class->name }}</option>
                            {{-- @foreach ($class as $class)
                        @endforeach --}}
                        </select>
                        @error('classes_id')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>
                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">
                            Subject Name
                        </span>
                        <select id="subject" name="subject_id"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            <option selected>Choose a Subject</option>
                            @foreach ($subjects as $subject)
                                <option 
                                    {{ (old('subject_id') == $subject->id) ? 'selected' : '' }}
                                    value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                            @endforeach
                            {{-- @foreach ($class as $class)
                        @endforeach --}}
                        </select>
                        @error('subject_id')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>
                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">
                            Teacher Name
                        </span>
                        <select id="teacher" name="teacher_id"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            <option selected>Select A Teacher</option>
                            @foreach ($teachers as $teacher)
                                <option 
                                    {{ (old('teacher_id') == $teacher->id) ? 'selected' : '' }}
                                    value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                            @endforeach
                            {{-- @foreach ($class as $class)
                        @endforeach --}}
                        </select>
                        @error('teacher_id')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>
                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">
                            Day
                        </span>

                        <div class="flex flex-wrap">
                            <div class="flex items-center mr-4">
                                <input name="day[]" checked="" id="red-checkbox" type="checkbox" value="saturday"
                                    class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="red-checkbox"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Saturday</label>
                            </div>
                            <div class="flex items-center mr-4">
                                <input name="day[]" checked="" id="green-checkbox" type="checkbox" value="sunday"
                                    class="w-4 h-4 text-green-600 bg-gray-100 rounded border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="green-checkbox"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sunday</label>
                            </div>
                            <div class="flex items-center mr-4">
                                <input name="day[]" checked="" id="purple-checkbox" type="checkbox" value="monday"
                                    class="w-4 h-4 text-purple-600 bg-gray-100 rounded border-gray-300 focus:ring-purple-500 dark:focus:ring-purple-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="purple-checkbox"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Monday</label>
                            </div>
                            <div class="flex items-center mr-4">
                                <input name="day[]" checked="" id="teal-checkbox" type="checkbox" value="tuesday"
                                    class="w-4 h-4 text-teal-600 bg-gray-100 rounded border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="teal-checkbox"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tuesday</label>
                            </div>
                            <div class="flex items-center mr-4">
                                <input name="day[]" checked="" id="yellow-checkbox" type="checkbox"
                                    value="wednesday"
                                    class="w-4 h-4 text-yellow-400 bg-gray-100 rounded border-gray-300 focus:ring-yellow-500 dark:focus:ring-yellow-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="yellow-checkbox"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Wednesday</label>
                            </div>
                            <div class="flex items-center mr-4">
                                <input name="day[]" checked="" id="orange-checkbox" type="checkbox"
                                    value="thirstday"
                                    class="w-4 h-4 text-orange-500 bg-gray-100 rounded border-gray-300 focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="orange-checkbox"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Thirstday</label>
                            </div>
                        </div>
                        @error('day')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>
                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">
                            Time
                        </span>
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input
                        {{ $errors->has('subject_code') ? 'border-red-600' : '' }}"
                            value="{{ old('time') }}" name="time" placeholder="12:00">
                        @error('time')
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

    </div>

    @section('script')
        <script>
            $(document).ready(function() {
                $('#subject').select2({
                    // placeholder: 'Select a Class',
                    theme: "classic"

                });
                $('#teacher').select2({
                    // placeholder: 'Select a Class',
                    theme: "classic"

                });
            });
        </script>
    @endsection
</x-app-layout>
