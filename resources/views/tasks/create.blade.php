<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Add New Task to "{{ $project->name }}"
        </h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">

            <form method="POST" action="{{ route('projects.tasks.store', $project) }}">
                @csrf

                <div>
                    <label for="title" class="block font-medium text-gray-700 dark:text-gray-300">Title</label>
                    <input type="text" name="title" id="title" required
                           class="mt-1 block w-full rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                           value="{{ old('title') }}">
                    @error('title')
                        <p class="text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="description" class="block font-medium text-gray-700 dark:text-gray-300">Description</label>
                    <textarea name="description" id="description" rows="4"
                              class="mt-1 block w-full rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="due_date" class="block font-medium text-gray-700 dark:text-gray-300">Due Date</label>
                    <input type="date" name="due_date" id="due_date"
                           class="mt-1 block w-full rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                           value="{{ old('due_date') }}">
                    @error('due_date')
                        <p class="text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="status" class="block font-medium text-gray-700 dark:text-gray-300">Status</label>
                    <select name="status" id="status"
                            class="mt-1 block w-full rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                            <option value="pending" {{ old('status', $task->status ?? '') == 'pending' ? 'selected' : '' }}>
                                Pending</option>
                            <option value="todo" {{ old('status', $task->status ?? '') == 'todo' ? 'selected' : '' }}>To
                                Do</option>
                            <option value="done" {{ old('status', $task->status ?? '') == 'done' ? 'selected' : '' }}>
                                Done</option>
                    </select>
                    @error('status')
                        <p class="text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-4">
                    <label for="priority" class="block font-medium text-gray-700 dark:text-gray-300">Priority</label>
                    <select name="priority" id="priority"
                        class="mt-1 block w-full rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                        <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Low</option>
                        <option value="medium" {{ old('priority', 'medium') == 'medium' ? 'selected' : '' }}>Medium</option>
                        <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High</option>
                    </select>
                    @error('priority')
                        <p class="text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6 flex justify-end space-x-4">
                    <a href="{{ route('projects.show', $project) }}"
                       class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 dark:bg-gray-600 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-200">
                        Cancel
                    </a>
                    <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                        Save Task
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
