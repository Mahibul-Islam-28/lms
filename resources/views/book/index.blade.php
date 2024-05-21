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

        <h3 class="text-center mt-5">book List</h3>

        <div class="container p-2 p-md-5">
            <a class="create-button" href="{{route('bookCreate')}}">Create +</a>

            <div class="table-responsive">
                <table class="table table-bordered table-striped pt-3" id="myTable">
                    <thead>
                        <tr>
                            <th>Book ID</th>
                            <th>Title</th>
                            <th>ISBN</th>
                            <th>Publish Date</th>
                            <th>Available Copies</th>
                            <th>Total Copies</th>
                            <th>Author ID</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($books as $book)
                        <tr>
                            <td>{{$book->book_id}}</td>
                            <td>{{$book->title}}</td>
                            <td>{{$book->isbn}}</td>
                            <td>{{$book->published_date}}</td>
                            <td>{{$book->available_copies}}</td>
                            <td>{{$book->total_copies}}</td>
                            <td>{{$book->author_id}}</td>
                            <td>
                                <a class="button" href="{{route('bookEdit', $book->book_id)}}">Edit</a>
                                <form method="post" action="{{route('bookDelete', $book->book_id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="button" value="Delete">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
        
    </div>
</section>
@endsection
