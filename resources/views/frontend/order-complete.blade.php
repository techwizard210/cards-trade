@extends('frontend.layout.app')

@section('content')

<div class="main">
    <div class="row py-5" style="padding: 100px 0px;">
        <h2 class="text-center">Thanks for your order. We will connect you soon. </h2>
        <a href="{{ route('buy') }}" class="btn btn-link btn-success-outline">Continue Shopping</a>
    </div>
</div>

@endsection
