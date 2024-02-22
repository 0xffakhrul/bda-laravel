<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold pb-5">Schedule New Appointment</h2>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('donor.appointments.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="grid grid-cols-2 gap-6 mb-5">
                            <div class="space-y-2">
                                <label class="block" for="">Date</label>
                                <input name="date" class="w-full border border-gray-300 rounded-md" type="date">
                            </div>
                            <div class="space-y-2">
                                <label class="block" for="">Time</label>
                                <input name="time" class="w-full border border-gray-300 rounded-md" type="time">
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="block" for="">Notes</label>
                            <textarea name="notes" class="w-full border border-gray-300 rounded-md" id="" cols="10" rows="10"></textarea>
                        </div>
                        {{-- <input name="notes" class="w-full border border-gray-300 rounded-md" type="notes"> --}}

                        <div class="">
                            <button class="bg-red-400 px-4 py-2 rounded-md font-bold text-gray-50"
                                type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
