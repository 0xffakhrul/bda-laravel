<x-app-layout>
    <div class="py-8">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            {{ Breadcrumbs::render('donor.appointments.edit', $appointment) }}
            <h2 class="text-3xl font-bold pb-5">Edit Appointment #{{ $appointment->id }}</h2>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($appointment->status == 'confirmed' || $appointment->status == 'accepted' || $appointment->status == 'rejected')
                        <div class="text-red-500 font-bold">
                            This appointment has already been
                            {{ $appointment->status }}. The form is no longer
                            editable.
                        </div>
                    @else
                        <form action="{{ route('donor.appointments.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <div class="grid grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="block" for="">Date</label>
                                    <input name="date"
                                        class="w-full transition duration-75 border border-slate-300 rounded-md focus:outline-none focus:border-rose-500 focus:ring-rose-700"
                                        type="date" value="{{ $appointment->date }}">
                                </div>
                                <div class="space-y-2">
                                    <label class="block" for="">Time</label>
                                    <select name="time"
                                        class="w-full transition duration-75 border border-slate-300 rounded-md focus:outline-none focus:border-rose-500 focus:ring-rose-700">
                                        <option value="08:00"
                                            {{ $appointment->time === '08:00:00' ? 'selected' : '' }}>
                                            8:00
                                            AM</option>
                                        <option value="09:00"
                                            {{ $appointment->time === '09:00:00' ? 'selected' : '' }}>
                                            9:00
                                            AM</option>
                                        <option value="10:00"
                                            {{ $appointment->time === '10:00:00' ? 'selected' : '' }}>
                                            10:00
                                            AM</option>
                                        <option value="11:00"
                                            {{ $appointment->time === '11:00:00' ? 'selected' : '' }}>
                                            11:00
                                            AM</option>
                                        <option value="12:00"
                                            {{ $appointment->time === '12:00:00' ? 'selected' : '' }}>
                                            12:00
                                            PM</option>
                                        <option value="14:00"
                                            {{ $appointment->time === '14:00:00' ? 'selected' : '' }}>
                                            2:00
                                            PM</option>
                                        <option value="15:00"
                                            {{ $appointment->time === '15:00:00' ? 'selected' : '' }}>
                                            3:00
                                            PM</option>
                                        <option value="16:00"
                                            {{ $appointment->time === '16:00:00' ? 'selected' : '' }}>
                                            4:00
                                            PM</option>
                                        <option value="17:00"
                                            {{ $appointment->time === '17:00:00' ? 'selected' : '' }}>
                                            5:00
                                            PM</option>
                                    </select>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="block" for="">Notes</label>
                                <textarea name="notes"
                                    class="w-full transition duration-75 border border-slate-300 rounded-md focus:outline-none focus:border-rose-500 focus:ring-rose-700"
                                    id="" cols="10" rows="10">
                                {{ $appointment->notes }}
                        </textarea>
                            </div>
                            <div class="">
                                <button class="bg-rose-700 px-4 py-2 rounded-md font-bold text-gray-50"
                                    type="submit">Submit</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
