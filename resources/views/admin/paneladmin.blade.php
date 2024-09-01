<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Section de gestion des administrateurs -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold mb-4">Gestion des Administrateurs</h2>

                    <table class="table-auto w-full">
                        <thead>
                        <tr>
                            <th class="px-4 py-2">Nom</th>
                            <th class="px-4 py-2">Prenom</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admins as $admin)
                            <tr>
                                <td>{{ $admin->nom }}</td>
                                <td>{{ $admin->prenom }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>
                                    <form action="{{ route('admin.removeAdmin', $admin->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Retirer Admin</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <!-- Bouton pour ajouter un administrateur -->
                    <div class="mt-4">
                        <a href="{{ route('admin.addAdminForm') }}" class="bg-white hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
                            Ajouter un Administrateur
                        </a>
                    </div>
                </div>
            </div>

            <!-- Section de gestion des organisateurs -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold mb-4">Gestion des Organisateurs</h2>

                    <table class="table-auto w-full">
                        <thead>
                        <tr>
                            <th class="px-4 py-2">Nom</th>
                            <th class="px-4 py-2">Prenom</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($organisateurs as $organisateur)
                            <tr>
                                <td>{{ $organisateur->nom }}</td>
                                <td>{{ $organisateur->prenom }}</td>
                                <td>{{ $organisateur->email }}</td>
                                <td>
                                    <form action="{{ route('admin.removeOrganisateur', $organisateur->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Retirer Organisateur</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <!-- Bouton pour ajouter un organisateur -->
                    <div class="mt-4">
                        <a href="{{ route('admin.addOrganisateurForm') }}" class="bg-white hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
                            Ajouter un Organisateur
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
