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
                    href="{{ route('classes.index') }}">
                    Back
                </a>
            </div>
        </div>




        <div class="w-3/4  m-auto overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap mb-6">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Time</th>
                            <th class="px-4 py-3">Subject Name</th>
                            <th class="px-4 py-3">Teacher</th>
                            <th class="px-4 py-3">Days</th>
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
                                    <a href="{{ route('teacher.show', $routine->teacher_id) }}"
                                        class="px-2 py-1 font-semibold 
                                            leading-tight text-green-700 
                                            bg-green-100 rounded-full 
                                            dark:bg-green-700 
                                            dark:text-green-100">
                                        {{ $routine->teacher->name }}
                                    </a>
                                </td>
                                <td class="px-4 py-3 text-sm break-all">
                                    @foreach ($routine->days as $day)
                                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">{{ Str::ucfirst($day) }}</span>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
