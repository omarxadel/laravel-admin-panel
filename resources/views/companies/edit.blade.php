<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>
    <div class="p-12">
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="{{ route('companies.update', $company->id) }}" method="POST">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text" name="name" id="name"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    value="{{ $company->name }}">
                            </div>

                            <div class="col-span-6">
                                <label for="email-address" class="block text-sm font-medium text-gray-700">Email
                                    address</label>
                                <input type="text" name="email" id="email-address" autocomplete="email"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    value="{{ $company->email }}">
                            </div>

                            <div class="col-span-6">
                                <label for="logo-input" class="block text-sm font-medium text-gray-700">Logo
                                    (URL)</label>
                                <input type="text" name="logo" id="logo-input"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    value="{{ $company->logo }}">
                            </div>

                            <div class="col-span-6">
                                <label for="website-input"
                                    class="block text-sm font-medium text-gray-700">Website</label>
                                <input type="text" name="website" id="website-input"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    value="{{ $company->website }}">
                            </div>

                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
                        </button>
                        @method('patch')
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
