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

        <h3 class="text-center mt-5">Member List</h3>

        <div class="container p-2 p-md-5">
            <a class="create-button" href="{{route('memberCreate')}}">Create +</a>

            <div class="table-responsive">
                <table class="table table-bordered table-striped pt-3" id="myTable">
                    <thead>
                        <tr>
                            <th>Member ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Registration Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($members as $member)
                        <tr>
                            <td>{{$member->member_id}}</td>
                            <td>{{$member->first_name . ' ' . $member->last_name}}</td>
                            <td>{{$member->email}}</td>
                            <td>{{$member->phone_number}}</td>
                            <td>{{$member->registration_date}}</td>
                            <td>
                                <a class="button" href="{{route('memberEdit', $member->member_id)}}">Edit</a>
                                <form method="post" action="{{route('memberDelete', $member->member_id)}}">
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
