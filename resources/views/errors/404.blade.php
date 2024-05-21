@extends('layout.main')
@section('css')
<link rel="stylesheet" href="{{asset('')}}css/404.css">
@endsection
@section('content')
<section class="main-content">
    <div class="container">

        <div id="notfound">
            <div class="notfound">
                <div class="notfound-404">
                    <h3>Oops! Page not found</h3>
                    <h1><span>4</span><span>0</span><span>4</span></h1>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
