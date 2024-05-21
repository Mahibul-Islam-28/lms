@extends('layout.main')
@section('css')
<link rel="stylesheet" href="{{asset('')}}css/login.css">
@endsection

@section('content')
<section class="main-content">

    <div class="alert-section">
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
    </div>

    <div class="form-section">
        <div class="form-control" id="sign-form">
            <form method="post">
                @csrf
                <input type="text" class="form-control" id="userName" placeholder="Enter User Name" name="userName">
                
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">

                <div class="my-4">
                    <input type="submit" class="login-btn" value="login">
                </div>
            </form>
        </div>

        <div class="forgot-password">
            
        </div>

    </div>


</section>
@endsection