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

        <h3 class="text-center mt-5">Operator List</h3>

        <div class="container p-2 p-md-5">
            <a class="create-button" href="{{route('operatorCreate')}}">Create +</a>

            <div class="table-responsive">
                <table class="table table-bordered table-striped pt-3" id="myTable">
                    <thead>
                        <tr>
                            <th>Operator ID</th>
                            <th>User Name</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($operators as $operator)
                        <tr>
                            <td>{{$operator->operator_id}}</td>
                            <td>{{$operator->user_name}}</td>
                            <td>{{$operator->type}}</td>
                            <td>
                                <a class="button" href="{{route('operatorEdit', $operator->operator_id)}}">Edit</a>
                                <form method="post" action="{{route('operatorDelete', $operator->operator_id)}}">
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
