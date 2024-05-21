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

        <h3 class="text-center mt-5">Member Create</h3>

        <form method="post" class="mx-4 my-2">
            @csrf
            <div class="form-group my-2">
                <label for="firstName">First Name</label>
                <input type="text" name="firstName" id="firstName" class="form-control mt-2">
            </div>
            <div class="form-group my-2">
                <label for="lastName">Last Name</label>
                <input type="text" name="lastName" id="lastName" class="form-control mt-2">
            </div>
            <div class="form-group my-2">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control mt-2">
            </div>
            <div class="form-group my-2">
                <label for="phone">Phone Number</label>
                <input type="text" name="phone" id="phone" class="form-control mt-2">
            </div>
            <div class="form-group my-2">
                <label for="registerDate">Registration Date</label>
                <input type="date" name="registerDate" id="registerDate" class="form-control mt-2">
            </div>

            <div class="my-4">
                <input type="submit" value="Create" class="btn btn-dark px-5">
            </div>

        </form>
    </div>
</section>

@endsection

