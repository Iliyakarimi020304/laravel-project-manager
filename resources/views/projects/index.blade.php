<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            My Projects
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-6">
            <a href="{{ route('projects.create') }}"
               class="inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
                + Create Project
            </a>
        </div>

        @if ($projects->isEmpty())
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
                <p class="text-gray-700 dark:text-gray-300">You don’t have any projects yet.</p>
            </div>
        @else
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($projects as $project)
                    <div class="bg-white dark:bg-gray-800 p-6 rounded shadow hover:shadow-lg transition">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $project->name }}</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-300">
                            {{ Str::limit($project->description, 100, '...') ?? 'No description' }}
                        </p>
                        <div class="mt-4">
                            <a href="{{ route('projects.show', $project) }}"
                               class="text-indigo-600 hover:underline dark:text-indigo-400">
                               View Details
                            </a>
                        </div>
                        <form action="{{ route('projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete Project</button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
