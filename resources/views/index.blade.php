@extends('layout.main')
@section('css')
<link rel="stylesheet" href="{{asset('')}}css/index.css">
@endsection
@section('content')
<section class="main-content">
    <div class="container">

        <div class="card-section">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="link-card">
                        <h3>Authors</h3>
                        <a href="{{route('author')}}">View Details</a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="link-card">
                        <h3>Books</h3>
                        <a href="">View Details</a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="link-card">
                        <h3>Members</h3>
                        <a href="">View Details</a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="link-card">
                        <h3>Borrowd Books</h3>
                        <a href="">View Details</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection