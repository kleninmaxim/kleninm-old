<x-default-layout>
    <main class="flex-1 flex flex-col">
        <div class="max-w-2xl w-full py-12 px-4 mx-auto">
            <div class="prose prose-zinc dark:prose-invert max-w-none">
                <h1>My projects and experience</h1>
            </div>

            @foreach($portfolios as $portfolio)
                <article class="not-prose mt-14 flex flex-col sm:flex-row gap-6">
                    <a class="flex-shrink-0" href="{{route('portfolio.show', ['portfolio' => $portfolio->slug])}}">
                        <img aria-hidden="true" class="w-40 h-40 border" src="{{asset('storage/' . $portfolio->thumbnail)}}" alt="Halving">
                    </a>
                    <div>
                        <h2 class="font-medium text-lg text-gray-800 dark:text-gray-200">
                            <a href="{{route('portfolio.show', ['portfolio' => $portfolio->slug])}}" class="hover:underline focus:underline">{{$portfolio->title}}</a>
                        </h2>
                        <div class="mt-3 prose prose-sm dark:prose-invert text-gray-500">
                            <p>{{$portfolio->description}}</p>
                        </div>
                        <p class="mt-3 text-sm text-gray-700 dark:text-gray-300">
                            <a href="{{route('portfolio.show', ['portfolio' => $portfolio->slug])}}" class="hover:underline focus:underline">Read more →</a>
                        </p>
                    </div>
                </article>
            @endforeach
        </div>
    </main>

    <x-footer is_links="true"/>
</x-default-layout>
