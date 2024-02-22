<x-app-layout>
    <div class="py-12">
        <div class="max-w-screen-3xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center justify-between pb-6">
                <h2 class="text-3xl font-extrabold">Appointments List</h2>
                <button class="bg-red-500 text-white font-bold px-4 py-2 rounded-md"><a
                        href="{{ route('donor.appointments.create') }}">Schedule new Appointment</a> </button>
            </div>
            <div class="grid grid-cols-2 gap-4">
                @foreach ($appointments as $appointment)
                    <div class="grid grid-cols-2 bg-white p-6 rounded-md ">
                        <div class="space-y-2 text-sm">
                            <p class="text-lg font-bold">Appointment #{{ $appointment->id }}</p>
                            <p class="">{{ $appointment->date }}</p>
                            <p class="">{{ $appointment->time }}</p>
                            <p>{{ $appointment->status }}</p>
                        </div>
                        <div class="flex flex-col items-end justify-center gap-2 font-semibold">
                            <button class="bg-blue-200 px-4 py-2 rounded-md w-36">Reschedule</button>
                            <button class="bg-blue-200 px-4 py-2 rounded-md w-36">Cancel</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
