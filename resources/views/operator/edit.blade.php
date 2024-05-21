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

        <h3 class="text-center mt-5">Create Operator</h3>

        <form method="post" class="mx-4 my-2">
            @csrf
            <div class="form-group my-2">
                <label for="userName">User Name</label>
                <input type="text" name="userName" id="userName" class="form-control mt-2" value="{{$operator->user_name}}">
            </div>
            <div class="form-group my-3">
            <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control mt-2" value="{{$operator->password}}">
            </div>
            <div class="form-group my-2">
                <label for="type">Type</label>
                <select name="type" id="type" class="form-select mt-1" required>
                    <option value="-1" disabled selected>-- select one ---</option>
                    <option value="admin" {{ $operator->type == 'admin' ? 'selected' : '' }}> Admin </option>
                    <option value="operator" {{ $operator->type == 'operator' ? 'selected' : '' }}> Operator </option>
                </select>
            </div>

            <div class="my-4">
                <input type="submit" value="Create" class="btn btn-dark px-5">
            </div>

        </form>
    </div>
</section>

@endsection

