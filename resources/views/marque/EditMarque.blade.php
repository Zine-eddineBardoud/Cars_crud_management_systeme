<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Marques') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-4xl font-bold mb-10 text-center">Ajouter Une Nouvelle Marque</h1>
                    <form method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-6">
                            <label for="des" class="block mb-2 text-sm font-medium text-gray-900">Designation</label>
                            <input type="text" id="des" name="des" value="{{ $marque->designation }}" class="bg-gray-50 border border-gray-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 dark:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500" placeholder="Designation ..." required autofocus>
                        </div>
                        <div class="mb-6">
                            <label for="fab" class="block mb-2 text-sm font-medium text-gray-900">Fabriquant</label>
                            <input type="text" id="fab" name="fab" value="{{ $marque->fabriquant }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500" placeholder="Fabriquant ..." required>
                        </div>
                        <button type="submit" style="background-color: darkorchid; padding: 10px 20px; border-radius: 8px;" class="text-white hover:bg-violet-600 active:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-300 ...">
                            Edit
                          </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>