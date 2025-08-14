<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Project
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
                <form method="POST" action="{{ route('projects.update', $project) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300">Name</label>
                        <input type="text" name="name" value="{{ old('name', $project->name) }}"
                               class="mt-1 block w-full rounded border-gray-300 dark:border-gray-700
                               dark:bg-gray-900 dark:text-gray-300" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300">Description</label>
                        <textarea name="description"
                                  class="mt-1 block w-full rounded border-gray-300 dark:border-gray-700
                                  dark:bg-gray-900 dark:text-gray-300">{{ old('description', $project->description) }}</textarea>
                    </div>

                    <div class="flex justify-end gap-2">
                        <a href="{{ route('projects.show', $project) }}"
                           class="px-4 py-2 bg-gray-200 rounded dark:bg-gray-700 dark:text-gray-300">Cancel</a>

                        <button type="submit"
                                class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
