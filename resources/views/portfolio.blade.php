<x-default-layout>
    <main class="flex-1 flex flex-col">
        <div class="max-w-2xl w-full py-12 px-4 mx-auto">
            <div class="prose prose-zinc dark:prose-invert max-w-none">
                <h1>My projects and experience</h1>
            </div>

            @foreach($portfolios as $portfolio)
                <article class="not-prose mt-14 flex flex-col sm:flex-row gap-6">
                    @if($portfolio->link)
                        <a href="{{ $portfolio->link }}" class="flex-shrink-0" target="_blank">
                    @endif
                            <img aria-hidden="true" class="w-40 h-40 border" src="{{asset('storage/' . $portfolio->thumbnail)}}" alt="Halving">
                    @if($portfolio->link)
                        </a>
                    @endif
                    <div>
                        <h2 class="font-medium text-lg text-gray-800 dark:text-gray-200">
                            @if($portfolio->link)
                                <a href="{{ $portfolio->link }}" class="hover:underline focus:underline" target="_blank">{{$portfolio->title}}</a>
                            @else
                                {{$portfolio->title}}
                            @endif
                        </h2>
                        <div class="mt-3 prose prose-sm dark:prose-invert text-gray-500">
                            <p>{{$portfolio->description}}</p>
                        </div>
                        @if($portfolio->link)
                            <p class="mt-3 text-sm text-gray-700 dark:text-gray-300">
                                <a href="{{ $portfolio->link }}" class="hover:underline focus:underline" target="_blank">Link →</a>
                            </p>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </main>

    <x-footer is_links="true"/>
</x-default-layout>
