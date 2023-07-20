@props(['quote'])

<div id="quote" class="text-white opacity-60 grid place-items-center" hx-get="/api/quotes" hx-trigger="every 60s" hx-swap="innerHTML">
    {!! $quote !!}
</div>