<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $user->name }}
            </h2>
            <a href="{{ route('pdf.generate', $user->username) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Télécharger CV
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">{{ $user->title }}</h3>
                        <p class="text-gray-600">{{ $user->bio }}</p>
                    </div>

                    <div class="mb-8">
                        <h4 class="text-lg font-semibold text-gray-700 mb-4">Compétences</h4>
                        <div class="flex flex-wrap gap-2">
                            @foreach($user->skills as $skill)
                                <span class="bg-gray-100 rounded-full px-4 py-2">{{ $skill->name }}</span>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <h4 class="text-lg font-semibold text-gray-700 mb-4">Projets</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($user->projects as $project)
                                <div class="border rounded-lg p-4">
                                    <h5 class="text-lg font-semibold mb-2">{{ $project->title }}</h5>
                                    <p class="text-gray-600 mb-4">{{ $project->description }}</p>
                                    @if($project->link)
                                        <a href="{{ $project->link }}" target="_blank" class="text-blue-500 hover:text-blue-700">
                                            Voir le projet
                                        </a>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 