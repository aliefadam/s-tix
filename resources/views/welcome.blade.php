@extends('layouts.user')

@section('content')
    <div class="grid grid-cols-12 gap-7">
        @include('components.carousel')
        <div class="col-span-5 flex flex-col gap-7 h-[500px]">
            @include('components.promotion-image', [
                'image' => 'imgs/gambar-4.jpg',
            ])
            @include('components.promotion-image', [
                'image' => 'imgs/gambar-5.jpg',
            ])
        </div>
    </div>
@endsection
