<x-app-layout>
    <div class="container grid px-6 mx-auto">
        <div class="flex justify-between">
            <div>
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Teachers
                </h2>
            </div>

            <div>
                <a class="block px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    href="{{ route('teacher.index') }}">
                    All Teachers
                </a>
            </div>


        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table>
                    <tr>
                        <td>Name</td>
                        <td>{{ $teacher->name }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $teacher->email }}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>{{ $teacher->phone }}</td>
                    </tr>
                    <tr>
                        <td>class_teacher</td>
                        <td>{{ $teacher->class_teacher }}</td>
                    </tr>
                    <tr>
                        <td>education</td>
                        <td>{{ $teacher->education }}</td>
                    </tr>
                    <tr>
                        <td>description</td>
                        <td>{{ $teacher->description }}</td>
                    </tr>
                    <tr>
                        <td>address</td>
                        <td>{{ $teacher->address }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
