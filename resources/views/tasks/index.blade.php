<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tasks for Project: {{ $project->name }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-4">
            <a href="{{ route('projects.tasks.create', $project) }}"
                class="inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
                + Add New Task
            </a>
        </div>

        @if ($tasks->isEmpty())
            <p class="text-gray-700 dark:text-gray-300">No tasks found for this project.</p>
        @else
            <div class="space-y-4">
                @foreach ($tasks as $task)
                    <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                            {{ $task->title }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300 mt-1">
                            {{ $task->description ?? 'No description' }}
                        </p>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                            Due: {{ $task->due_date ? $task->due_date->format('M d, Y') : 'No due date' }}
                        </p>
                        <p class="mt-1 text-sm font-medium text-indigo-600 dark:text-indigo-400">
                            Status: {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                        </p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
