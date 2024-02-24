<x-app-layout>
    <div class="py-8">
        <div class="max-w-screen-2xl mx-auto sm:px-4 lg:px-6">
            {{ Breadcrumbs::render('admin.users.index') }}
            <div class="flex items-center justify-between pb-4">
                <x-title title="Users List" />
                <x-primary-button><a href="{{ route('admin.users.create') }}">Add new User</a></x-primary-button>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" text-gray-900 dark:text-gray-100">
                    <div class="p-5">
                        <div class="flex items-center gap-2">
                            <input type="text" class="border border-gray-300 rounded-md" placeholder="Search">
                            <button class="bg-blue-400 px-4 py-2 text-white font-bold rounded-md">Search</button>
                        </div>
                    </div>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-950">
                        <thead class="text-gray-950 uppercase bg-gray-50 border-b border-t border-gray-200">
                            <tr>
                                <th class="px-6 py-3.5">ID</th>
                                <th class="px-6 py-3.5">Name</th>
                                <th class="px-6 py-3.5">Email</th>
                                <th class="px-6 py-3.5">Role</th>
                                <th class="px-6 py-3.5">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr
                                    class="bg-white border-b border-gray-200 hover:bg-gray-50 font-medium text-gray-800">
                                    <td class="px-6 py-4">{{ $user->id }}</td>
                                    <td class="px-6 py-4">
                                        {{ $user->name }}
                                    </td>
                                    <td class="px-6 py-4">{{ $user->email }}</td>
                                    <td class="px-6 py-4">
                                        @if ($user->role === 'donor')
                                            Donor
                                        @elseif($user->role === 'admin')
                                            Admin
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 flex items-center gap-4">
                                        <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}"
                                            class="hover:underline font-semibold text-rose-500 flex items-center gap-1"><svg
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                            Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="px-6 py-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
