<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (Session::has('success'))
                <div class="bg-green-500 text-white px-6 py-4 border-0 rounded relative mb-4">
                    <span class="inline-block align-middle mr-8">
                        {{ Session::get('success') }}
                    </span>
                    <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none"
                            onclick="this.parentElement.remove();">
                        <span>×</span>
                    </button>
                </div>
            @endif
            <form action="{{ url('/task') }}" method="get" class="mt-4 p-4 bg-white rounded-md shadow-md flex items-end">
                <div class="flex-1 mr-4">
                    <label for="project" class="block text-sm font-medium text-gray-600">Select Project:</label>
                    <select name="project_id" id="project" class="form-select">
                        <option value="">All Projects</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}" {{ $projectId == $project->id ? 'selected' : '' }}>
                                {{ $project->name }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" id="filter-task" class="btn-blue bg-blue-500 p-2 text-cyan-50 ml-2">Filter</button>
                </div>
                <a href="{{ route('task.create') }}" class="hover:underline bg-blue-500 p-2 text-cyan-50">Create Task</a>
            </form>

            <ul class="mt-4 grid gap-4" id="task-list">
                @if ($tasks->count() > 0)
                    @foreach ($tasks as $task)
                        <li class="bg-white p-4 rounded-md shadow-md" data-task-id="{{ $task->id }}" data-task-priority="{{ $task->priority }}">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-lg font-semibold">{{ $task->name }}</h3>
                                    <span class="text-gray-600">Priority: {{ $task->priority }}</span>
                                    <div class="col-auto">{{ $task->project ? $task->project->name : '' }}</div>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <a href="{{ route('task.edit', $task->id) }}" class="hover:underline bg-blue-500 p-2 text-cyan-50">Edit</a>
                                    <form action="{{ route('task.destroy', $task) }}" method="POST" id="deleteForm"
                                          onsubmit="return confirm('Are you sure you want to delete this task?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="confirmDelete()"
                                                class="hover:underline bg-red-500 p-2 text-cyan-50">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @else
                    <p>There is no tasks available</p>
                @endif
            </ul>
        </div>
    </div>
</x-app-layout>
