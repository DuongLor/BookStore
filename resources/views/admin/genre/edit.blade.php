@extends('admin.templates.app')
@section('title', 'Genre')
@section('content')
    <a href="{{ route('admin.genre') }}" class="btn btn-primary shadow-md mr-2 mb-3 " style="width: 200px">Back</a>
    <div class="">
        <form action="{{ route('admin.genre.update', $genre->id) }}" method="POST" class="form form-vertical">
						@csrf
						@method('PUT')
            <div>
                <label for="regular-form-1" class="form-label">Name</label>
                <input id="regular-form-1" type="text" class="form-control" name="name" placeholder="Name" value="{{ $genre->name }}">
            </div>
            <button type="submit" class="btn btn-primary mt-5">Edit</button>
        </form>
    </div>
@endsection
