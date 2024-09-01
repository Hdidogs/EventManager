<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestion des Événements') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3>{{ __('Liste des Événements') }}</h3>
                    <table class="min-w-full leading-normal">
                        <thead>
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                Nom de l'Événement
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($events as $event)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm">
                                    {{ __($event->titre) }}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm">
                                    <!-- Bouton pour modifier l'événement -->
                                    <a href="{{ route('event.edit', $event->id) }}" class="text-blue-500 hover:text-blue-700">
                                        {{ __('Modifier') }}
                                    </a>

                                    <!-- Bouton pour supprimer l'événement -->
                                    <form action="{{ route('event.destroy', $event->id) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 ml-4" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?');">
                                            {{ __('Supprimer') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
