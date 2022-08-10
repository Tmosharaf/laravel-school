<x-app-layout>
@php
    function attendance($attendance){
        if($attendance > 0){
            echo '<span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">Present</span>';
        }else {
           echo '<span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">Absent</span>';
        }
    }
@endphp
    <div class="container grid px-6 mx-auto">
        <div class="flex justify-between">
            <div>
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Class: {{ $class->name }}
                </h2>
            </div>

            <div>
                <a class="block px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    href="{{ route('classes.index') }}">
                    All Classes
                </a>
            </div>
        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="grid gap-6 mb-8 md:grid-cols-3">
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <h4 class="mb-4 font-semibold text-lg text-gray-600 dark:text-gray-300">
                        Class Teacher
                    </h4>
                    <h6 class="text-gray-600 dark:text-gray-300">Mr. Jalal Uddin</h6>
                    <span class="text-xs text-gray-600 dark:text-gray-300">Bsc In CSE</span>
                    <p class="text-gray-600 text-sm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Culpa
                        sint fuga consequuntur recusandae aliquid similique dolor non autem. Autem veritatis dolorum
                        nobis reprehenderit. Assumenda dolorum voluptas ipsum tempora eum? Obcaecati?</p>
                </div>

                <div class="min-w-0 p-4 text-white bg-purple-600 rounded-lg shadow-xs">
                    <h4 class="mb-4 font-semibold">
                        Today's Report
                    </h4>
                    <span class="text-xs underline">{{ date('d-m-y') }}</span>
                    <p>Total Students: {{ $students->count() }}</p>
                    <p>Present: {{ $present }}</p>
                    <p class="text-red-200">Absent: {{ $absent }}</p>
                </div>

                <div class="min-w-0 p-4 text-white bg-sky-600 rounded-lg shadow-xs">
                    <h4 class="mb-4 font-semibold">
                        Today's Routine
                    </h4>
                    <table class="table-fixed w-full text-sm">
                        <thead class="text-center">
                            <tr>
                                <th>Subject</th>
                                <th>Teacher</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr class="border-t border-b">
                                <td>Islamic History</td>
                                <td>Md Noman</td>
                                <td>11.00</td>
                            </tr>
                            <tr class="border-t border-b">
                                <td>Islamic History</td>
                                <td>Md Noman</td>
                                <td>11.00</td>
                            </tr>
                            <tr class="border-t border-b">
                                <td>Islamic History</td>
                                <td>Md Noman</td>
                                <td>11.00</td>
                            </tr>
                            <tr class="border-t border-b">
                                <td>Islamic History</td>
                                <td>Md Noman</td>
                                <td>11.00</td>
                            </tr>
                            <tr class="border-t border-b">
                                <td>Islamic History</td>
                                <td>Md Noman</td>
                                <td>11.00</td>
                            </tr>
                            <tr class="border-t border-b">
                                <td>Islamic History</td>
                                <td>Md Noman</td>
                                <td>11.00</td>
                            </tr>
                            <tr class="border-t border-b">
                                <td>Islamic History</td>
                                <td>Md Noman</td>
                                <td>11.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>















        <hr>
        <div class="w-full overflow-x-auto mb-8">
            <form action="{{ route('attendance.store') }}" method="post">
                @csrf
                <input type="hidden" name="class_name" value="{{ $class->name }}">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Roll</th>
                        <th class="px-4 py-3">Student Name</th>
                        <th class="px-4 py-3">Class Name</th>
                        <th class="px-4 py-3">Attendance</th>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3">Actions</th>
                        <th class="px-4 py-3">Attendance</th>

                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($students as $student)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <p class="font-medium">{{ $student->roll }}</p>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <p class="font-medium">{{ $student->name }}</p>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{-- //TODO: Show here something --}}
                            <a href="" class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">{{ $student->classes->name }}</a>
                        </td>
                        <td class="px-4 py-3 text-xs">
                            {{ attendance($student->attendances->count()) }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{-- //TODO: Show here something --}}
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">
                                <a href="{{ route('student.edit', $student) }}"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Edit">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg>
                                </a>
                                {{-- <form action="{{ route('student.destroy', $student) }}" method="post">
                                    @csrf
                                    @method('DELETE') --}}
                                    <a href=""
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                          </svg>
                                    </a>

                            </div>
                        </td>
                        <td class="px-4 py-3 text-center flex justify-center">
                            <div class="flex items-center space-x-4 text-sm">
                                @if ($student->attendances->count() == 0)
                                <input type="checkbox" name="attendance[{{ $student->roll  }}]" value="{{ $student->roll }}"
                                class="form-checkbox h-6 w-6 text-purple-600 dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                aria-label="Attendance"
                                >
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        
            <div class="flex flex-row-reverse my-2 mr-4">
                <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Attendance</button>
            </div>

        </form>
            {{ $students->onEachSide(0)->links() }}
        </div>

    </div>
</x-app-layout>
