<x-app-layout>
    <div class="py-8">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            {{ Breadcrumbs::render('admin.appointments.show', $appointment) }}
            <x-title title="Appointment #{{ $appointment->id }}" />
            <div class="sm:hidden">
                <label for="Tab" class="sr-only">Tab</label>
                <select id="Tab" class="w-full rounded-md border-gray-200">
                    <option select>View</option>
                    <option>Edit</option>
                </select>
            </div>
            <div class="hidden sm:flex items-center justify-center pb-6">
                <nav class="flex gap-6 bg-white p-2 rounded-lg" aria-label="Tabs">
                    <a href="{{ route('admin.appointments.show', ['id' => $appointment->id]) }}"
                        class="shrink-0 flex items-center gap-x-2 rounded-lg {{ Route::is('admin.appointments.show') ? 'text-rose-700 bg-rose-100' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700' }}  p-2 text-sm font-medium ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        View Appointment
                    </a>
                    <a href="{{ route('admin.appointments.edit', ['id' => $appointment->id]) }}"
                        class="shrink-0 flex items-center gap-x-2 rounded-lg {{ Route::is('admin.appointments.edit') ? 'text-rose-700 bg-rose-100' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700' }}  p-2 text-sm font-medium ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                        Edit Appointment
                    </a>
                </nav>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form class="">
                        @csrf
                        <div class="grid grid-cols-2 gap-6 mb-5">
                            <div class="space-y-2">
                                {{-- <label class="block" for="">Date</label>
                                <input name="date" class="w-full border border-gray-300 bg-gray-100 rounded-md"
                                    value="{{ $appointment->date }}" type="date" disabled> --}}
                                <p class="font-medium">Date</p>
                                <p>{{ $appointment->date }}</p>
                            </div>
                            <div class="space-y-2">
                                <p class="font-medium">Time</p>
                                <p>{{ $appointment->time }}</p>
                            </div>
                            <div class="space-y-2">
                                <p class="font-medium">Status</p>
                                <div>
                                    <x-badge status="{{ $appointment->status }}" />
                                </div>
                            </div>
                            <div class="space-y-2">
                                <p class="font-medium">Notes</p>
                                <p>{{ $appointment->notes }}</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mt-4 flex gap-2">
                <form action="{{ route('admin.appointments.destroy', ['id' => $appointment->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-primary-button type="submit"
                        class="px-4 py-2 bg-red-500 text-white font-bold rounded-md">Delete</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
