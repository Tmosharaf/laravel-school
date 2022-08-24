<x-app-layout>

    <div class="container grid px-6 mx-auto">
        <div class="flex justify-between">
            <div>
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Routine
                </h2>
            </div>

            <div>
                {{-- <a class="block px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    href="{{ route('routine.create') }}">
                    Create
                </a> --}}
            </div>
        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                @foreach ($classes as $class)
                    <!-- Card -->
                    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <div class=" mr-4 text-orange-500">
                            {{-- <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                </path>
                            </svg> --}}
                            <a href="{{ route('classes.show', $class->name) }}"
                                class="p-3 bg-purple-600 hover:bg-purple-700  dark:text-gray-400 rounded-lg text-white  ">
                                {{ $class->name }}
                            </a>

                        </div>
                        <div>
                            <a href="{{ route('routine.show', $class->id) }}"
                                class="inline-block p-2 text-sm font-medium text-purple-600 hover:text-purple-700 dark:text-gray-200">Show
                                Routine</a>
                            <a href="{{ route('routine.create', ['class_id' => $class]) }}"
                                class="inline-block p-2 text-sm font-medium text-green-400 hover:text-green-500 dark:text-gray-200">Create
                                Routine</a>
                        </div>
                    </div>

                    <!-- /Card -->
                @endforeach
            </div>
            {{-- {{ $classes->links() }} --}}
        </div>
    </div>
</x-app-layout>
