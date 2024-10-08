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
                            <h3>{{ __($event->titre) }}
                            @if($userReservations[$event->id])
                                {{ __("✔") }}
                            @endif
                            </h3>
                            <br>
                            <br>
                            <div class="p-6 text-light-gray-900 white:text-gray-100" style="background-color: rgb(17,24,39); border-radius: 10px;">
                                {{ __($event->description) }}
                            </div>
                            <br>
                            {{ __("Date de début") }} : {{ __($event->date) }}   |   {{ __("Places restantes") }} : {{ $placesRestantes[$event->id] }}
                            <div class="flex items-center justify-end mt-4">
                            @if (Route::has('login'))
                                @Auth
                                    @if($placesRestantes[$event->id] <= 0)
                                        <p style="color: red">/!\ Plus de places disponibles /!\</p>
                                    @elseif($userReservations[$event->id])
                                        <form action="{{ route('events.desinscrire', $event->id) }}" method="POST">
                                            @csrf
                                            <x-primary-button class="ms-4" type="submit">Se désinscrire</x-primary-button>
                                        </form>
                                    @else
                                        <form action="{{ route('events.inscrire', $event->id) }}" method="POST">
                                            @csrf
                                            <x-primary-button class="ms-4" type="submit">S'inscrire</x-primary-button>
                                        </form>
                                  @endif
                                @else
                                    <p style="color: red">/!\ La connexion est requise pour pouvoir s'inscrire a un évenment /!\</p>
                                @endif
                            @endif
                            </div>
                        </div>
                    </div>
                    <br>
              @endforeach
            @endif
        </div>
    </div>
</x-app-layout>
