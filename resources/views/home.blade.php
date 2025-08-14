<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">
            Welcome Back 👋
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <p class="text-gray-700 dark:text-gray-300 text-lg">
                    Manage your tasks and projects in one place. Organize. Prioritize. Get things done.
                </p>
                <a href="{{ route('projects.create') }}"
                   class="mt-4 inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
                    + Create Project
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">Pinned Projects</h3>
                <p class="text-gray-600 dark:text-gray-400">No pinned projects yet.</p>
            </div>

        </div>
    </div>
</x-app-layout>
