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

        <h3 class="text-center mt-5">Create Book</h3>

        <form method="post" class="mx-4 my-2">
            @csrf
            <div class="form-group my-2">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control mt-2">
            </div>
            <div class="form-group my-3">
                <label for="isbn">ISBN</label>
                <input type="text" name="isbn" id="isbn" class="form-control mt-2">
            </div>
            <div class="form-group my-3">
                <label for="publishDate">Publish Date</label>
                <input type="date" name="publishDate" id="publishDate" class="form-control mt-2">
            </div>
            <div class="form-group my-3">
                <label for="availableCopy">Available Copies</label>
                <input type="number" name="availableCopy" id="availableCopy" class="form-control mt-2">
            </div>
            <div class="form-group my-3">
                <label for="totalCopy">Total Copies</label>
                <input type="number" name="totalCopy" id="totalCopy" class="form-control mt-2">
            </div> 
            <div class="form-group my-2">
                <label for="authorID">Author ID</label>
                <select name="authorID" id="authorID" class="form-select mt-1" required>
                    <option value="-1" disabled selected>-- select one ---</option>
                    @foreach($authors as $author)
                    <option value="{{$author->author_id}}"> {{$author->name}} </option>
                    @endforeach
                </select>
            </div>

            <div class="my-4">
                <input type="submit" value="Create" class="btn btn-dark px-5">
            </div>

        </form>
    </div>
</section>

@endsection

