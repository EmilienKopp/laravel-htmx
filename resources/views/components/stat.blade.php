@props(['stat'])

<div class="bg-white/5 relative fade-me-out" id="stat_{{$stat->id}}">
    <input type="checkbox" class="absolute top-2 right-2" name="is_active" @checked($stat->is_active)
            hx-put="/api/stats/{{$stat->id}}/update" hx-target="#stat_{{$stat->id}}" hx-swap="outerHTML" />
    <div class="px-6 pb-4">
        <dt class="text-sm font-semibold leading-6 text-gray-300">{{$stat->label}}</dt>
        <dd class="order-first text-2xl font-semibold tracking-tight text-white">{{$stat->value}} {{$stat->unit}}</dd>
    </div>
</div>

<style>
    .fade-me-out.htmx-swapping {
        color: green;
        transition: all 1s ease-out;
    }
</style>