@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>
                <div class="mx-auto mt-3">
                    @if ($user->profile->image==null)
                    <img class="img-thumbnail" style="width:150px; height:150px; object-fit: cover;" src="/images/laravel.png" alt="">
                    @else
                        <img class="img-thumbnail" style="width:150px; height:150px; border-radius:50%; object-fit: cover;" src="{{ $user->profile->getPublicImage() }}" alt="">
                    @endif
                    <h3 class="text-center mt-3">{{ Auth::User()->name(); }}</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="/profile" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Profile Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image" autofocus>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Upload') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
