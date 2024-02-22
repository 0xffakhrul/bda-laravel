<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Index!') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <button class="px-4 py-2 rounded-lg font-bold bg-green-600 text-white"><a
                    href="{{ route('admin.users.create') }}">New Employee</a> </button>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('User Index!') }}
                    @foreach ($users as $user)
                        <p>{{ $user->name }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
