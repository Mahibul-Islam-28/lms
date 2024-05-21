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

        <h3 class="text-center mt-5">Borrowd Books List</h3>

        <div class="container p-2 p-md-5">
            <a class="create-button" href="{{route('borrowCreate')}}">Create +</a>

            <div class="table-responsive">
                <table class="table table-bordered table-striped pt-3" id="myTable">
                    <thead>
                        <tr>
                            <th>Borrow ID</th>
                            <th>Member ID</th>
                            <th>Book ID</th>
                            <th>Borrow Date</th>
                            <th>Return Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($borrows as $borrow)
                        <tr>
                            <td>{{$borrow->borrow_id}}</td>
                            <td>{{$borrow->member_id}}</td>
                            <td>{{$borrow->book_id}}</td>
                            <td>{{$borrow->borrow_date}}</td>
                            <td>{{$borrow->return_date}}</td>
                            <td>{{$borrow->status}}</td>
                            <td>
                                <a class="button" href="{{route('borrowEdit', $borrow->borrow_id)}}">Edit</a>
                                <form method="post" action="{{route('borrowDelete', $borrow->borrow_id)}}">
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
