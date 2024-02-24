<x-app-layout>
    <div class="py-12">
        <div class="max-w-screen-3xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center justify-between pb-6">
                <h2 class="text-3xl font-extrabold">Appointments List</h2>
                <button class="bg-rose-700 text-white font-bold px-4 py-2 rounded-md"><a
                        href="{{ route('donor.appointments.create') }}">Schedule new Appointment</a> </button>
            </div>
            <div class="grid grid-cols-2 gap-4">
                @foreach ($appointments as $appointment)
                    <div class="grid grid-cols-2 bg-white p-6 rounded-md shadow-sm">
                        <div class="space-y-2 text-sm">
                            <p class="text-lg font-bold">Appointment #{{ $appointment->id }}</p>
                            <p class="flex items-center gap-2 font-medium"><svg xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                </svg>
                                {{ $appointment->date }}</p>
                            <p class="flex items-center gap-2 font-medium pb-2"><svg xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                {{ $appointment->time }}</p>
                            @if ($appointment->status === 'canceled')
                                <span
                                    class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded border border-red-400">Canceled</span>
                            @elseif ($appointment->status === 'accepted' || $appointment->status === 'confirmed')
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded border border-green-400">Confirmed</span>
                            @elseif ($appointment->status === 'rejected')
                                <span
                                    class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded border border-red-400">Rejected</span>
                            @else
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded border border-blue-400">Pending</span>
                            @endif
                        </div>
                        <div class="flex flex-col items-end justify-center gap-2 font-semibold">
                            <button class="bg-rose-700 px-4 py-2 rounded-md w-32 text-white"><a
                                    href="{{ route('donor.appointments.edit', ['id' => $appointment->id]) }}">Edit</a>
                            </button>
                            <button
                                class="bg-white border-2 border-rose-700 text-rose-700 hover:bg-rose-700 hover:text-white transition delay-100 px-4 py-2 rounded-md w-32">Cancel</button>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="py-4">
                {{ $appointments->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
