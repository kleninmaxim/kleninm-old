@props([
    'is_links' => false,
])

<footer class="p-8">
    @if($is_links)
        <div class="mb-6 flex justify-center">
            <x-social-links />
        </div>
    @endif

    <p class="text-center text-xs text-gray-500">
        © {{ Carbon\Carbon::today()->year }} Klenin
    </p>
</footer>
