<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Index!') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf
                        <label for="">Name</label>
                        <input name="name" type="text">
                        <label for="">Email</label>
                        <input name="email" type="email">
                        <label for="">Role</label>
                        <select name="role" id="">
                            <option value="admin">Admin</option>
                            <option value="donor">Donor</option>
                        </select>
                        <button type="submit">Create User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
