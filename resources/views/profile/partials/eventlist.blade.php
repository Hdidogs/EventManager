<section>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold mb-4">Mes Réservations</h1>

                    @if($reservations->isEmpty())
                        <p>Vous n'avez aucune réservation pour le moment.</p>
                    @else
                            @foreach($reservations as $reservation)
                                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                        <div class="p-6 text-light-gray-900 white:text-gray-100"  style="background-color: rgb(17,24,39); border-radius: 10px;" >
                                        <!-- Titre de l'événement -->
                                        <h3>
                                            {{ __($reservation->event->titre) }}
                                        </h3>
                                        <br>
                                        <br>

                                        <!-- Description de l'événement -->
                                            <p>
                                            {{ __($reservation->event->description) }}
                                            </p>
                                        <br>

                                        <!-- Date de début et autres détails -->
                                        {{ __("Date de début") }} : {{ __($reservation->event->date) }}

                                        <div class="flex items-center justify-end mt-4">
                                            <!-- Action de désinscription -->
                                            <form action="{{ route('events.desinscrire', $reservation->event->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <x-primary-button class="ms-4" type="submit">Se désinscrire</x-primary-button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
