<x-app-layout>
    <div class="py-8">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="grid grid-cols-2 gap-6 mb-5">
                            <div class="space-y-2">
                                <label class="block" for="">Name</label>
                                <input name="name" class="w-full border border-gray-300 rounded-md" type="text">
                            </div>
                            <div class="space-y-2">
                                <label class="block" for="">Email</label>
                                <input name="email" class="w-full border border-gray-300 rounded-md" type="email">
                            </div>
                            <select name="role" class="w-full border border-gray-300 rounded-md" id="">
                                <option value="admin">Admin</option>
                                <option value="donor">Donor</option>
                            </select>
                        </div>
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
