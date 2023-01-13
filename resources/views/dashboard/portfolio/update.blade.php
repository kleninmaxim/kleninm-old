<x-app-layout>
    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.css">
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Portfolio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="md:grid md:grid-cols-3 md:gap-6">

                    <div class="md:col-span-1 sm:m-4 mt-2">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Create new portfolio</h3>
                            <p class="mt-1 text-sm text-gray-600">Nothing...</p>
                        </div>
                    </div>

                    <div class="mt-5 md:col-span-2 md:mt-0">
                        <form action="{{ route('portfolio.create') }}" method="POST" id="createPostForm">
                            @csrf
                            <input name="id" type="hidden" value="{{ $test->id }}">
                            <div class="shadow sm:overflow-hidden sm:rounded-md">
                                <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                    <div class="mb-6">
                                        <label class="block">
                                            <span class="text-gray-700">Description</span>
                                            <textarea id="markdown-editor" class="block w-full mt-1 rounded-md" name="body" rows="3">{!! $test->body !!}</textarea>
                                        </label>
                                        @error('description')
                                        <div class="text-sm text-red-600">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                @if(session()->has('success'))
                                    <div>{{ session('success') }}</div>
                                @endif
                                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                    <button type="submit"
                                            class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script>
        <script>
            const easyMDE = new EasyMDE({
                showIcons: ['strikethrough', 'code', 'table', 'redo', 'heading', 'undo', 'heading-bigger', 'heading-smaller', 'heading-1', 'heading-2', 'heading-3', 'clean-block', 'horizontal-rule'],
                element: document.getElementById('markdown-editor')});
        </script>
    @endpush
</x-app-layout>
