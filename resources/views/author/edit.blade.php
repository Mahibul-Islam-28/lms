@extends('layout.main')

@section('content')
<section class="main-content">
    <div class="container">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>{{ $message }}</strong>
        </div>
        @endif

        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>{{ $message }}</strong>
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <h3 class="text-center mt-5">Create Author</h3>

        <form method="post" class="mx-4 my-2">
            @csrf
            <div class="form-group my-2">
                <label for="name">Author Name</label>
                <input type="text" name="name" id="name" class="form-control mt-2" value="{{$author->name}}">
            </div>
            <div class="form-group my-3">
                <label for="bio">Bio</label>
                <textarea name="bio" id="bio"  class="form-control mt-2">{{$author->bio}}</textarea>
            </div>

            <div class="my-4">
                <input type="submit" value="Update" class="btn btn-dark px-5">
            </div>

        </form>
    </div>
</section>

@endsection