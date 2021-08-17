@extends('frontend.layouts.master')




@section('head')

<style>
    body {
        background-image: url('Images/darren-nunis-cxE7SXKnzv0-unsplash (1).jpg');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    p {
        font-size: 18px
    }

</style>
@endsection


@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-dark mb-5">Privacy & Policy</h1>
            @if($privacyPolicy)
            {!! $privacyPolicy->description !!}
            @endif
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
