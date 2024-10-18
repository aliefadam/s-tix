<div class="flex items-center gap-2 text-sm h-fit">
    @foreach ($before as $item)
        <a href="{{ $item['url'] }}" class="text-teal-700 hover:underline flex items-center gap-2">
            {{ $item['name'] }}
        </a>
        <i class="fa-regular fa-angle-right"></i>
    @endforeach
    <span class="text-gray-700 flex items-center gap-2">
        {{ $active }}
    </span>
</div>
