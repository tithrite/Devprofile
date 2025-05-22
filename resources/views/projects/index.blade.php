<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Mes Projets') }}
            </h2>
            <a href="{{ route('projects.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Ajouter un projet
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if($projects->isEmpty())
                        <p class="text-gray-500">Vous n'avez pas encore de projets.</p>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($projects as $project)
                                <div class="border rounded-lg p-4">
                                    <h3 class="text-lg font-semibold mb-2">{{ $project->title }}</h3>
                                    <p class="text-gray-600 mb-4">{{ $project->description }}</p>
                                    @if($project->link)
                                        <a href="{{ $project->link }}" target="_blank" class="text-blue-500 hover:text-blue-700 mb-4 block">
                                            Voir le projet
                                        </a>
                                    @endif
                                    <div class="flex justify-end space-x-2">
                                        <a href="{{ route('projects.edit', $project) }}" class="text-blue-500 hover:text-blue-700">
                                            Modifier
                                        </a>
                                        <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?')">
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 