<div class="flex items-center gap-2 text-sm h-fit">
    @if (isset($before))
        @foreach ($before as $item)
            @if (isset($item['back']))
                <a href="javascript:void(0)" id="back" class="text-teal-700 hover:underline">
                    {{ $item['name'] }}
                </a>
            @else
                <a href="{{ $item['url'] }}" class="text-teal-700 hover:underline">
                    {{ $item['name'] }}
                </a>
            @endif
            <i class="fa-regular fa-angle-right"></i>
        @endforeach

    @endif
    <span class="text-gray-700 flex items-center gap-2">
        {{ $active }}
    </span>
</div>

<script type="module">
    $("#back").click(() => {
        history.back();
    })
</script>
