@extends('layouts.main')
@section('header')
    <x-main-header></x-main-header>
@endsection
@section('content')
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            @foreach ([
                ['title' => 'demo title', 'body' => 'demo body', 'created_at' => now()],
                ['title' => 'demo title 2', 'body' => 'demo body2 ', 'created_at' => now()->addDays(2)]
            ] as $item)
                <x-post-review :post="$item"></x-post-review>
            @endforeach
            <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
        </div>
    </div>
</div>
@endsection
