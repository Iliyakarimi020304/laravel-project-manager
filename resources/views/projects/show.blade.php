<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $project->name }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
            <p class="text-gray-700 dark:text-gray-300 mb-6">
                {{ $project->description ?? 'No description provided.' }}
            </p>

            <div class="flex justify-between items-center mb-6">
                <a href="{{ route('projects.index') }}"
                   class="text-gray-600 hover:underline dark:text-gray-400">← Back to Projects</a>
                <a href="{{ route('projects.edit', $project) }}"
                   class="text-indigo-600 hover:underline dark:text-indigo-400">Edit Project</a>
            </div>

            {{-- Tasks List --}}
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Tasks</h3>

            @if($project->tasks->isEmpty())
                <p class="text-gray-600 dark:text-gray-300">No tasks yet.</p>
            @else
                <ul class="space-y-4">
                    @foreach($project->tasks as $task)
                        <li class="bg-gray-100 dark:bg-gray-700 p-4 rounded shadow">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h4 class="font-semibold text-gray-900 dark:text-gray-100">{{ $task->title }}</h4>
                                    <p class="text-gray-700 dark:text-gray-300">
                                        {{ $task->description ?? 'No description' }}
                                    </p>

                                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                        Due: {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('M d, Y') : 'No due date' }}
                                    </p>

                                    {{-- Status & Priority Badges --}}
                                    <div class="mt-2 flex space-x-2">
                                        @php
                                            $statusColors = [
                                                'pending' => 'bg-gray-400 text-gray-900',
                                                'todo' => 'bg-blue-500 text-white',
                                                'done' => 'bg-green-500 text-white',
                                            ];
                                            $priorityColors = [
                                                'low' => 'bg-green-200 text-green-800',
                                                'medium' => 'bg-yellow-200 text-yellow-800',
                                                'high' => 'bg-red-200 text-red-800',
                                            ];
                                        @endphp

                                        {{-- Status Badge --}}
                                        <span class="px-2 py-1 rounded text-xs font-semibold {{ $statusColors[$task->status] ?? 'bg-gray-300' }}">
                                            {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                                        </span>

                                        {{-- Priority Badge --}}
                                        @if($task->priority)
                                            <span class="px-2 py-1 rounded text-xs font-semibold {{ $priorityColors[$task->priority] ?? 'bg-gray-300' }}">
                                                {{ ucfirst($task->priority) }} Priority
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div>
                                    <a href="{{ route('projects.tasks.edit', [$project, $task]) }}"
                                       class="text-indigo-600 hover:underline dark:text-indigo-400 mr-4">Edit</a>
                                    <form action="{{ route('projects.tasks.destroy', [$project, $task]) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                onclick="return confirm('Are you sure?')"
                                                class="text-red-600 hover:underline dark:text-red-400">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif

            {{-- Link to create new task --}}
            <div class="mt-6">
                <a href="{{ route('projects.tasks.create', $project) }}"
                   class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                    + Add New Task
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
