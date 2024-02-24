<x-app-layout>
    <div class="py-8">
        <div class="max-w-screen-2xl mx-auto sm:px-4 lg:px-6">
            {{ Breadcrumbs::render('admin.appointments.index') }}
            <div class="flex items-center justify-between pb-4">
                <h1 class="text-3xl font-bold">Appointments List</h1>
                <x-primary-button class="bg-rose-700 px-4 py-2 text-gray-50 font-bold rounded-md">Add New
                    Appointment</x-primary-button>
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
                                <th class="px-6 py-3.5">Donor</th>
                                <th class="px-6 py-3.5">Date</th>
                                <th class="px-6 py-3.5">Time</th>
                                {{-- <th class="px-6 py-3.5">Notes</th> --}}
                                <th class="px-6 py-3.5">Status</th>
                                <th class="px-6 py-3.5">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointments as $appointment)
                                <tr
                                    class="bg-white border-b border-gray-200 hover:bg-gray-50 font-medium text-gray-800">
                                    <td class="px-6 py-4">{{ $appointment->id }}</td>
                                    <td class="px-6 py-4">
                                        @if ($appointment->donor)
                                            @if ($appointment->donor->user)
                                                {{ $appointment->donor->user->name }}
                                            @else
                                                No Donor Assigned
                                            @endif
                                        @else
                                            No Donor Assigned
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">{{ $appointment->date }}</td>
                                    <td class="px-6 py-4">{{ $appointment->time }}</td>
                                    {{-- <td class="px-6 py-4">{{ $appointment->notes }}</td> --}}
                                    <td class="px-6 py-4">
                                        <x-badge status="{{ $appointment->status }}" />
                                    </td>
                                    <td class="px-6 py-4 flex items-center gap-4"><a
                                            href="{{ route('admin.appointments.show', ['id' => $appointment->id]) }}"
                                            class="hover:underline font-semibold text-gray-700 flex items-center gap-1"><svg
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                            View</a>
                                        <a href="{{ route('admin.appointments.edit', ['id' => $appointment->id]) }}"
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
                        {{ $appointments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
