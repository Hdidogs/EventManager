<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($events->isEmpty())
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("Il n'y a aucun évenement de prévu") }}
                    </div>
                </div>
            @else
                @foreach($events as $event)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            {{ __($event->titre) }}
                        </div>
                    </div>
                    <br>
              @endforeach
            @endif
        </div>
    </div>
</x-app-layout>
