<x-app-layout>
    <div class="py-8">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            {{ Breadcrumbs::render('admin.users.edit', $user) }}
            <h2 class="text-3xl font-bold pb-5">Edit {{ $user->name }}'s profile</h2>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('admin.users.update', ['id' => $user->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="pb-4">
                            <div class="pb-4">
                                <p class="pb-2 font-semibold">Personal Information</p>
                            </div>
                            <div class="grid grid-cols-2 gap-4 mb-5">
                                <div class="space-y-2">
                                    <label class="block text-sm" for="">Name</label>
                                    <input name="name"
                                        class="w-full transition duration-75 border border-slate-300 rounded-md focus:outline-none focus:border-rose-500 focus:ring-rose-700"
                                        type="text" value="{{ $user->name }}">
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-sm" for="">Email</label>
                                    <input name="email"
                                        class="w-full transition duration-75 border border-slate-300 rounded-md focus:outline-none focus:border-rose-500 focus:ring-rose-700"
                                        type="email" value="{{ $user->email }}">
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-sm" for="">Role</label>
                                    <select name="role"
                                        class="w-full transition duration-75 border border-slate-300 rounded-md focus:outline-none focus:border-rose-500 focus:ring-rose-700"
                                        id="">
                                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin
                                        </option>
                                        <option value="donor" {{ $user->role === 'donor' ? 'selected' : '' }}>Donor
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        @if ($user->role === 'donor')
                            <div>
                                <div class="pb-4">
                                    <p class="pb-2 font-semibold">Donor Information</p>
                                </div>
                                <div class="grid grid-cols-2 gap-4 mb-5">
                                    <div class="space-y-2">
                                        <label class="block text-sm" for="">Blood Type</label>
                                        <select name="blood_type" id=""
                                            class="w-full transition duration-75 border border-slate-300 rounded-md focus:outline-none focus:border-rose-500 focus:ring-rose-700">
                                            <option value="A+"
                                                {{ optional($donorInformation)->blood_type === 'A+' ? 'selected' : '' }}>
                                                A+
                                            </option>
                                            <option value="A-"
                                                {{ optional($donorInformation)->blood_type === 'A-' ? 'selected' : '' }}>
                                                A-
                                            </option>
                                            <option value="B+"
                                                {{ optional($donorInformation)->blood_type === 'B+' ? 'selected' : '' }}>
                                                B+
                                            </option>
                                            <option value="B-"
                                                {{ optional($donorInformation)->blood_type === 'B-' ? 'selected' : '' }}>
                                                B-
                                            </option>
                                            <option value="O+"
                                                {{ optional($donorInformation)->blood_type === 'O+' ? 'selected' : '' }}>
                                                O+
                                            </option>
                                            <option value="O-"
                                                {{ optional($donorInformation)->blood_type === 'O-' ? 'selected' : '' }}>
                                                O-
                                            </option>
                                            <option value="AB+"
                                                {{ optional($donorInformation)->blood_type === 'AB+' ? 'selected' : '' }}>
                                                AB+
                                            </option>
                                            <option value="AB-"
                                                {{ optional($donorInformation)->blood_type === 'AB-' ? 'selected' : '' }}>
                                                AB-
                                            </option>
                                        </select>
                                    </div>
                                    <div class="space-y-2">
                                        <label class="block text-sm" for="">Contact Number</label>
                                        <input name="contact_number"
                                            class="w-full transition duration-75 border border-slate-300 rounded-md focus:outline-none focus:border-rose-500 focus:ring-rose-700"
                                            type="text" value="{{ optional($donorInformation)->contact_number }}">
                                    </div>
                                    <div class="space-y-2">
                                        <label class="block text-sm" for="">Gender</label>
                                        <select name="gender" id=""
                                            class="w-full transition duration-75 border border-slate-300 rounded-md focus:outline-none focus:border-rose-500 focus:ring-rose-700">
                                            <option value="male"
                                                {{ optional($donorInformation)->gender === 'male' ? 'selected' : '' }}>
                                                Male</option>
                                            <option value="female"
                                                {{ optional($donorInformation)->gender === 'female' ? 'selected' : '' }}>
                                                Female</option>
                                        </select>
                                        {{-- <input name="gender" class="w-full border text-sm border-gray-300 rounded-md"
                                            type="text" value="{{ optional($donorInformation)->gender }}"> --}}
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="">
                            <button class="bg-rose-700 text-sm px-4 py-2 rounded-md font-bold text-gray-50"
                                type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
