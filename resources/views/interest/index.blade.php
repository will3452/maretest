@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your Interest</div>
                <div class="card-body">
                    <form action="{{route('interest.index')}}" method="POST">
                        @csrf
                        <div>
                            <label for="name">Name</label>
                            <input name="name" type="text" class="form-control">
                        </div>
                        <div>
                            <button class="btn btn-primary mt-2">
                                Add Interest
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <ul class="mt-4">
                @foreach (auth()->user()->interests as $item)
                    <li>
                        {{ $item->name }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
