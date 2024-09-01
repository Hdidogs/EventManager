<!-- resources/views/events/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modifier l\'événement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('events.update', $event->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Titre -->
                        <div>
                            <x-input-label for="titre" :value="__('Titre')" />
                            <x-text-input id="titre" class="block mt-1 w-full" type="text" name="titre" :value="old('titre', $event->titre)" required autofocus />
                            <x-input-error :messages="$errors->get('titre')" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description', $event->description)" required />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Date -->
                        <div class="mt-4">
                            <x-input-label for="date" :value="__('Date')" />
                            <x-text-input id="date" class="block mt-1 w-full" type="datetime-local" name="date" :value="old('date', $event->date)" required />
                            <x-input-error :messages="$errors->get('date')" class="mt-2" />
                        </div>

                        <!-- Nombre de place -->
                        <div class="mt-4">
                            <x-input-label for="nombre_de_places" :value="__('Nombre de place')" />
                            <x-text-input id="nombre_de_places" class="block mt-1 w-full" type="number" min="1" name="nombre_de_places" :value="old('nombre_de_places', $event->nombre_de_places)" required />
                            <x-input-error :messages="$errors->get('nombre_de_places')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Mettre à jour l\'événement') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
