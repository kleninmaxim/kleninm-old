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
                        <form action="{{ route('admin.portfolio.update', ['portfolio' => $portfolio->id]) }}" method="POST" id="createPostForm" enctype="multipart/form-data">
                            @csrf
                            <div class="shadow sm:overflow-hidden sm:rounded-md">
                                <div class="space-y-6 bg-white px-4 py-5 sm:p-6 grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" name="title" id="title" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{$portfolio->title}}">
                                        </div>
                                        @error('title')
                                            <div class="text-sm text-red-600">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="space-y-6 bg-white px-4 py-5 sm:p-6 grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">https://kleninm.site/portfolio/</span>
                                            <input type="text" name="slug" id="slug" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="example-post" value="{{old('thumbnail', $portfolio->slug)}}">
                                        </div>
                                        @error('slug')
                                        <div class="text-sm text-red-600">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                    <div>
                                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                        <div>
                                            <textarea id="description" name="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Description...">{{old('thumbnail', $portfolio->description)}}</textarea>
                                        </div>
                                        @error('description')
                                        <div class="text-sm text-red-600">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                    <div>
                                        <label for="body"  class="block">
                                            <span class="block text-sm font-medium text-gray-700">Body</span>
                                            <textarea id="body" class="block w-full mt-1 rounded-md" name="body" rows="3">{{old('thumbnail', $portfolio->body)}}</textarea>
                                        </label>
                                        @error('body')
                                        <div class="text-sm text-red-600">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                    <div>
                                        <label for="thumbnail" class="block text-sm font-medium text-gray-700">Portfolio photo</label>
                                        <input class="border border-gray-200 p-2 w-full rounded" name="thumbnail" id="thumbnail" type="file" value="{{old('thumbnail')}}">
                                        <img src="{{ asset('storage/' . $portfolio->thumbnail) }}" alt="" class="rounded-xl mt-6" width="100">
                                        @error('thumbnail')
                                        <div class="text-sm text-red-600">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                @if(session()->has('success'))
                                    <div class="space-y-6 bg-white px-4 py-5 sm:p-6">{{ session('success') }}</div>
                                @endif
                                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                    <button type="submit"
                                            class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                        Update
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
                element: document.getElementById('body')});
        </script>
    @endpush
</x-app-layout>
