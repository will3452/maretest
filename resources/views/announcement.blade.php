@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Announcement</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Announcement</div>
                <div class="card-body">
                    @if(session('success'))
                        <p class="ttext-center text-light badge bg-primary text-wrap w-100 p-3 text-uppercase fs-5">{{session('success')}}</p>
                    @endif
                    <form action="{{route('announcement')}}" method="POST">
                        
                        @csrf
                        <div class="mt-2">
                             <label for="data">Date</label>
                             <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" autocomplete="date" autofocus>
                           @error('date')
                             <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                             </span>
                           @enderror
                        </div>
                        <div class="mt-2">
                           <label for="location">Location</label>
                           <input id="location" type="location" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" autocomplete="location" autofocus>
                         @error('location')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                         @enderror
                      </div>
                        <div class="mt-2">
                           <label for="description">Text</label>
                           <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="description" autofocus></textarea>
                           @error('description')
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
                @if(auth()->user()->announcement->count()==0)
                <p class="text-center text-primary">Announcement Post yet</p>
                @else
                @foreach (auth()->user()->announcement as $item)
                <div class="mx-auto border mt-3 p-3 text-center">
                    <span>Description: {{$item->description}}</span>
                    <br>
                    <span>Where: {{$item->where}}</span>
                    <br>
                    <span>Date: {{$item->date}}</span>
                </div>
                @endforeach
                @endif
        </div>
    </div>
</div>
@endsection
