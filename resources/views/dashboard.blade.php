<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12 max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-8">

        {{-- Stats Overview --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow text-center">
                <p class="text-gray-500 dark:text-gray-400">Total Projects</p>
                <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $totalProjects }}</p>
            </div>
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow text-center">
                <p class="text-gray-500 dark:text-gray-400">Total Tasks</p>
                <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $totalTasks }}</p>
            </div>
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow text-center">
                <p class="text-gray-500 dark:text-gray-400">Completed Tasks</p>
                <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $tasksByStatus['done'] ?? 0 }}</p>
            </div>
        </div>


        {{-- Tasks by Status --}}
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
            <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">Tasks by Status</h3>
            <ul class="space-y-2">
                <li>
                    <span class="text-gray-700 dark:text-gray-300">Todo:</span>
                    <span class="font-bold text-blue-600 dark:text-blue-400">{{ $tasksByStatus['todo'] ?? 0 }}</span>
                </li>
                <li>
                    <span class="text-gray-700 dark:text-gray-300">Pending:</span>
                    <span
                        class="font-bold text-yellow-600 dark:text-yellow-400">{{ $tasksByStatus['pending'] ?? 0 }}</span>
                </li>
                <li>
                    <span class="text-gray-700 dark:text-gray-300">Done:</span>
                    <span class="font-bold text-green-600 dark:text-green-400">{{ $tasksByStatus['done'] ?? 0 }}</span>
                </li>
            </ul>
        </div>


        {{-- Overdue Tasks --}}
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Overdue Tasks</h3>
            @if ($overdueTasks->isEmpty())
                <p class="text-gray-500 dark:text-gray-400">No overdue tasks 🎉</p>
            @else
                <ul class="space-y-4">
                    @foreach ($overdueTasks as $task)
                        <li
                            class="flex justify-between items-center border-b pb-2 border-gray-200 dark:border-gray-700">
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $task->title }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Project: {{ $task->project->name }}
                                </p>
                                <p class="text-sm text-red-500">
                                    Due: {{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}
                                </p>
                            </div>
                            <span
                                class="px-3 py-1 text-xs rounded-full
                        @if ($task->priority == 'high') bg-red-500 text-white
                        @elseif($task->priority == 'medium') bg-yellow-500 text-white
                        @else bg-green-500 text-white @endif">
                                {{ ucfirst($task->priority) }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>



        {{-- Quick Actions --}}
        <div>
            <a href="{{ route('projects.create') }}"
                class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                + Add New Project
            </a>
        </div>

    </div>
</x-app-layout>
