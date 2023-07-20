@props(['stats' => []])
<div id="dynamic-content" class="bg-gray-900 transition duration-300 w-full">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:max-w-none">
            <div class="text-center">
                <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Statistics</h2>
                <p class="mt-1 text-lg leading-8 text-gray-300">Displayed with HTMX
                </p>
            </div>
            <dl
                class="mt-4 grid grid-cols-1 gap-0.5 overflow-hidden rounded-2xl text-center sm:grid-cols-2 lg:grid-cols-4">

                @foreach ($stats as $stat)
                
                <x-stat :$stat />
                
                @endforeach

            </dl>
        </div>
    </div>
</div>
