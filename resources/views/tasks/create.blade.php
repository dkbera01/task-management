<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Task') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container mx-auto mt-8">
                <form action="{{ route('task.store') }}" method="POST" class="mt-4 p-4 bg-white rounded-md shadow-md ">
                    @csrf

                    <div class="mb-4">
                        <label for="selectOption" class="block text-sm font-medium text-gray-700">Select Project</label>
                        <select name="project_id" id="project" required
                                class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                            <option value="">Select Project</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}">
                                    {{ $project->name }}
                                </option>
                            @endforeach
                            @error('project_id')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="textInput" class="block text-sm font-medium text-gray-700">Task Name</label>
                        <input type="text" id="textInput" name="name" placeholder="Task name" required
                               class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                        @error('name')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
</x-app-layout>
