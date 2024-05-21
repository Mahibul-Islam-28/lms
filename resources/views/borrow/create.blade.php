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

        <h3 class="text-center mt-5">Create Borrowd Books</h3>

        <form method="post" class="mx-4 my-2">
            @csrf
            <div class="form-group my-2">
                <label for="memberID">Member ID</label>
                <select name="memberID" id="memberID" class="form-select mt-1" required>
                    <option value="-1" disabled selected>-- select one ---</option>
                    @foreach($members as $member)
                    <option value="{{$member->member_id}}"> {{$member->first_name . ' ' . $member->last_name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group my-2">
                <label for="bookID">Book ID</label>
                <select name="bookID" id="bookID" class="form-select mt-1" required>
                    <option value="-1" disabled selected>-- select one ---</option>
                    @foreach($books as $book)
                    <option value="{{$book->book_id}}"> {{$book->title}} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group my-3">
                <label for="borrowDate">Borrow Date</label>
                <input type="date" name="borrowDate" id="borrowDate" class="form-control mt-2">
            </div>
            <div class="form-group my-3">
                <label for="returnDate">Return Date</label>
                <input type="date" name="returnDate" id="returnDate" class="form-control mt-2">
            </div>
            <div class="form-group my-2">
                <label for="bookID">Status</label>
                <select name="status" id="status" class="form-select mt-1" required>
                    <option value="-1" disabled selected>-- select one ---</option>
                    <option value="Borrowed"> Borrowed </option>
                    <option value="Returned"> Returned </option>
                    <option value="Overdue"> Overdue </Overdue>
                </select>
            </div>

            <div class="my-4">
                <input type="submit" value="Create" class="btn btn-dark px-5">
            </div>

        </form>
    </div>
</section>

@endsection

