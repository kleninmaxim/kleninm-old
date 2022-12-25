<x-default-layout>
    <main class="flex-1 flex flex-col">
        <div class="max-w-2xl w-full py-12 px-4 mx-auto">
            <div class="prose prose-zinc dark:prose-invert max-w-none">
                <h1>Roadmap of my experience</h1>
            </div>

            <article class="not-prose mt-14 flex flex-col sm:flex-row gap-6">
                <a class="flex-shrink-0" href="/example">
                    <img aria-hidden="true" class="w-40 h-40 border" src="{{ asset('assets/images/portfolio/halving.png') }}" alt="Halving">
                </a>
                <div>
                    <p class="mb-3 text-gray-500 text-sm">December, 2022</p>
                    <h2 class="font-medium text-lg text-gray-800 dark:text-gray-200">
                        <a href="/example" class="hover:underline focus:underline">Trading bot Halving</a>
                    </h2>
                    <div class="mt-3 prose prose-sm dark:prose-invert text-gray-500">
                        <p> According to the mathematical algorithm, this bot trades on the binance exchange in BTC/USDT market.
                            The bot needs to set the lower price, the upper price of bitcoin and the total number of orders that the bot should place.
                            In accordance with the algorithm, the bot places new orders.
                        </p>
                    </div>
                    <p class="mt-3 text-sm text-gray-700 dark:text-gray-300">
                        <a href="/example" class="hover:underline focus:underline">Read more →</a>
                    </p>
                </div>
            </article>
        </div>
    </main>

    <x-footer is_links="true"/>
</x-default-layout>
