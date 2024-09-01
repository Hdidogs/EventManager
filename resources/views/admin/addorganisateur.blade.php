<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold mb-4">Ajouter un Organisateur</h2>

                    <form method="POST" action="{{ route('admin.addOrganisateur') }}">
                        @csrf
                        <div>
                            <x-input-label for="email" :value="__('Email de l\'utilisateur')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" required autofocus />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Ajouter Organisateur') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
