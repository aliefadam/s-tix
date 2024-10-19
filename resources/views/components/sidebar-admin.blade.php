<aside class="w-[250px] bg-white shadow-sm fixed top-0">
    <div class="h-[80px] flex items-center justify-center p-5 text-teal-700">
        <a href="{{ route('admin.dashboard') }}" class="text-2xl poppins-black">
            S-TIX
        </a>
    </div>
    <div class="p-5 flex flex-col gap-7 h-[calc(100vh-80px)] overflow-auto scrollbar">
        @foreach (getMenuTitle() as $title)
            <div class="">
                <span class="text-sm text-gray-700 poppins-medium block mb-2">{{ $title->name }}</span>
                @foreach (getMenuLink($title->slug) as $link)
                    <a href="{{ route($link->url) }}"
                        class="flex gap-2 items-center p-3 rounded-md {{ request()->is("admin/$link->name") ? 'text-white bg-gradient-to-r from-teal-600 to-teal-700' : '' }}">
                        <i class="{{ $link->icon }}"></i>
                        <span class="text-sm capitalize">{{ $link->name }}</span>
                    </a>
                @endforeach
            </div>
        @endforeach
    </div>
</aside>
