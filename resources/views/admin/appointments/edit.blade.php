<x-app-layout>
    <div class="py-8">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            {{ Breadcrumbs::render('admin.appointments.edit', $appointment) }}
            <x-title title="Edit Appointment #{{ $appointment->id }}" />
            <div class="sm:hidden">
                <label for="Tab" class="sr-only">Tab</label>
                <select id="Tab" class="w-full rounded-md border-gray-200">
                    <option select>View</option>
                    <option>Edit</option>
                </select>
            </div>
            <div class="hidden sm:flex items-center justify-center pb-6">
                <nav class="flex gap-6 bg-white p-2 rounded-md" aria-label="Tabs">
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
                    @if ($appointment->status == 'confirmed' || $appointment->status == 'accepted' || $appointment->status == 'rejected')
                        <div class="text-red-500 font-bold">
                            This appointment has already been
                            {{ $appointment->status }}. The form is no longer
                            editable.
                        </div>
                    @else
                        <form method="POST" class=""
                            action="{{ route('admin.appointments.update', ['id' => $appointment->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-2 gap-6 mb-5">
                                <div class="space-y-2">
                                    <label class="block text-sm" for="">Date</label>
                                    <input name="date"
                                        class="w-full transition duration-75 border border-slate-300 rounded-md focus:outline-none focus:border-rose-500 focus:ring-rose-700"
                                        value="{{ $appointment->date }}" type="date">
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-sm" for="">Time</label>
                                    <select name="time"
                                        class="w-full transition duration-75 border border-slate-300 rounded-md focus:outline-none focus:border-rose-500 focus:ring-rose-700">
                                        <option value="08:00">8:00 AM</option>
                                        <option value="09:00">9:00 AM</option>
                                        <option value="10:00">10:00 AM</option>
                                        <option value="11:00">11:00 AM</option>
                                        <option value="12:00">12:00 PM</option>
                                        <option value="14:00">2:00 PM</option>
                                        <option value="15:00">3:00 PM</option>
                                        <option value="16:00">4:00 PM</option>
                                        <option value="17:00">5:00 PM</option>
                                    </select>
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-sm" for="status">Status</label>
                                    <select name="status" id="status"
                                        class="w-full transition duration-75 border border-slate-300 rounded-md focus:outline-none focus:border-rose-500 focus:ring-rose-700">
                                        <option value="accepted"
                                            {{ $appointment->status === 'accepted' ? 'selected' : '' }}>Accepted
                                        </option>
                                        <option value="rejected"
                                            {{ $appointment->status === 'rejected' ? 'selected' : '' }}>Rejected
                                        </option>
                                    </select>
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-sm" for="">Notes</label>
                                    <textarea name="notes" id=""
                                        class="w-full transition duration-75 border border-slate-300 rounded-md focus:outline-none focus:border-rose-500 focus:ring-rose-700"
                                        cols="30" rows="4">
                                    {{ $appointment->notes }}
                                </textarea>
                                </div>
                            </div>
                            {{-- <button class="px-4 py-2 mt-4 bg-rose-700 text-sm rounded-md font-bold text-white"
                                type="submit">Submit</button> --}}
                            <x-primary-button>Submit</x-primary-button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
