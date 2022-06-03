@extends('layouts.main')

@section('content')
<div class="container">
   <h1>Post</h1>
   <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">Create Post</div>
              <div class="card-body">
                  @if(session('success'))
                     <p class="ttext-center text-light badge bg-primary text-wrap w-100 p-3 text-uppercase fs-5">{{session('success')}}</p>
                  @endif
                
                  <form action="{{route('post')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                     <div class="mt-2">
                        <label for="image">Image</label>
                        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image" autofocus>
                        @error('image')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                     </div>
                     <div class="mt-2">
                          <label for="title">Title</label>
                          <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>
                        @error('title')
                          <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                     </div>
                     <div class="mt-2">
                        <label for="body">Text</label>
                        <textarea id="body" type="text" class="form-control @error('body') is-invalid @enderror" name="body" value="{{ old('body') }}" autocomplete="body" autofocus></textarea>
                        @error('body')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                     </div>
                      <div>
                          <button class="btn btn-primary mt-2">
                              Submit
                          </button>
                      </div>
                  </form>
              </div>
          </div>
          
            @if(auth()->user()->post->count()==0)
               <p class="text-center text-primary">No Post yet</p>
            @else
              @foreach (auth()->user()->post as $item)
              <div class="mx-auto border mt-3 p-3 text-center">
                 <img class="img-thumbnail" style="width:auto; height:300px; object-fit: cover;" src="{{$item->getPublicImage()}}" alt="">
                 <p>Title: {{$item->title}}</p>
                 <span>Post: {{$item->body}}</span>
              </div>
              @endforeach
            @endif
      </div>
  </div>
</div>
@endsection
