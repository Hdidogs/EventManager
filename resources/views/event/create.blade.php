<x-guest-layout>
    <form method="POST" action="{{ route('events.store') }}">
        @csrf

        <!-- Titre -->
        <div>
            <x-input-label for="titre" :value="__('Titre')" />
            <x-text-input id="titre" class="block mt-1 w-full" type="text" name="titre" :value="old('titre')" required autofocus autocomplete="titre" />
            <x-input-error :messages="$errors->get('titre')" class="mt-2" />
        </div>

        <!-- Description -->
        <div>
            <x-input-label for="description" :value="__('Description')" />
            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="description" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <!-- Date -->
        <div class="mt-4">
            <x-input-label for="date" :value="__('Date')" />
            <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required autocomplete="date" />
            <x-input-error :messages="$errors->get('date')" class="mt-2" />
        </div>

        <!-- Nombre de place -->
        <div class="mt-4">
            <x-input-label for="nombre_de_places" :value="__('Nombre de place')" />
            <x-text-input id="nombre_de_places" class="block mt-1 w-full" type="number" name="nombre_de_places" :value="old('nombre_de_places')" required autocomplete="nombre_de_places" />
            <x-input-error :messages="$errors->get('nombre_de_places')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Ajouter un Évenement') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
