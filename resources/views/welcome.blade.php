@extends('layouts.main')
@section('header')
    <x-main-header></x-main-header>
@endsection
@section('content')
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            @foreach (\App\Models\Post::latest()->limit(5)->get() as $item)
                <img class="img-thumbnail" style="width:auto; height:300px; object-fit: cover;" src="{{$item->getPublicImage()}}" alt="">
                <x-post-review :post="$item"></x-post-review>
            @endforeach
            @if (\App\Models\Post::count())
                <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
            @else
                @guest
                <div class="d-flex justify-content-center mb-4">
                    <a class="btn btn-primary text-uppercase mx-2" href="/register">Register now</a>
                    <a class="btn btn-secondary text-uppercase mx-2" href="/login">Login</a>
                </div>
                @endguest
            @endif
        </div>
    </div>
</div>
@endsection
