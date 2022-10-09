@extends('frontend.layout.app')

@section('content')

<div class="page-header" style="background: no-repeat 60%/cover url({{ asset('assets/images/elements/policy-header.jpg') }});">
    <div class="container d-flex flex-column align-items-center">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb" style="color: #222529;">
                    <li class="breadcrumb-item"><a href="{{ route('home', app()->getLocale()) }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">FAQ</li>
                </ol>
            </div>
        </nav>
        <h1>Frequently Asked Questions</h1>
    </div>
</div>

<div class="container py-4">

    <div class="row">

        <div class="col-lg-6 px-5">
            <h2 class="mt-6 mb-1">FAQ</h2>
            <div id="accordion">
                <div class="card card-accordion">
                    <a class="card-header collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Curabitur eget leo at velit imperdiet viaculis
                        vitaes?
                    </a>

                    <div id="collapseOne" class="collapse" data-parent="#accordion" style="">
                        <p>Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit. Curabitur eget leo at velit
                            imperdiet varius. In eu ipsum vitae velit
                            congue iaculis vitae at risus. Nullam tortor
                            nunc, bibendum vitae semper a, volutpat eget
                            massa.</p>
                    </div>
                </div>

                <div class="card card-accordion">
                    <a class="card-header collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseOne">
                        Curabitur eget leo at velit imperdiet vague
                        iaculis vitaes?
                    </a>

                    <div id="collapseTwo" class="collapse" data-parent="#accordion" style="">
                        <p>Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit. Curabitur eget leo at velit
                            imperdiet varius. In eu ipsum vitae velit
                            congue iaculis vitae at risus. Nullam tortor
                            nunc, bibendum vitae semper a, volutpat eget
                            massa. Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit. Integer
                            fringilla, orci sit amet posuere auctor,
                            orci eros pellentesque odio, nec
                            pellentesque erat ligula nec massa. Aenean
                            consequat lorem ut felis ullamcorper posuere
                            gravida tellus faucibus. Maecenas dolor
                            elit, pulvinar eu vehicula eu, consequat et
                            lacus. Duis et purus ipsum. In auctor mattis
                            ipsum id molestie. Donec risus nulla,
                            fringilla a rhoncus vitae, semper a massa.
                            Vivamus ullamcorper, enim sit amet consequat
                            laoreet, tortor tortor dictum urna, ut
                            egestas urna ipsum nec libero. Nulla justo
                            leo, molestie vel tempor nec, egestas at
                            massa. Aenean pulvinar, felis porttitor
                            iaculis pulvinar, odio orci sodales odio, ac
                            pulvinar felis quam sit.</p>
                    </div>
                </div>

                <div class="card card-accordion">
                    <a class="card-header collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Curabitur eget leo at velit imperdiet viaculis
                        vitaes?
                    </a>

                    <div id="collapseThree" class="collapse" data-parent="#accordion" style="">
                        <p>Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit. Curabitur eget leo at velit
                            imperdiet varius. In eu ipsum vitae velit
                            congue iaculis vitae at risus. Nullam tortor
                            nunc, bibendum vitae semper a, volutpat eget
                            massa.</p>
                    </div>
                </div>

                <div class="card card-accordion">
                    <a class="card-header collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                        Curabitur eget leo at velit imperdiet vague
                        iaculis vitaes?
                    </a>

                    <div id="collapseFour" class="collapse" data-parent="#accordion" style="">
                        <p>Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit. Curabitur eget leo at velit
                            imperdiet varius. In eu ipsum vitae velit
                            congue iaculis vitae at risus. Nullam tortor
                            nunc, bibendum vitae semper a, volutpat eget
                            massa. Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit. Integer
                            fringilla, orci sit amet posuere auctor,
                            orci eros pellentesque odio, nec
                            pellentesque erat ligula nec massa. Aenean
                            consequat lorem ut felis ullamcorper posuere
                            gravida tellus faucibus. Maecenas dolor
                            elit, pulvinar eu vehicula eu, consequat et
                            lacus. Duis et purus ipsum. In auctor mattis
                            ipsum id molestie. Donec risus nulla,
                            fringilla a rhoncus vitae, semper a massa.
                            Vivamus ullamcorper, enim sit amet consequat
                            laoreet, tortor tortor dictum urna, ut
                            egestas urna ipsum nec libero. Nulla justo
                            leo, molestie vel tempor nec, egestas at
                            massa. Aenean pulvinar, felis porttitor
                            iaculis pulvinar, odio orci sodales odio, ac
                            pulvinar felis quam sit.</p>
                    </div>
                </div>

                <div class="card card-accordion">
                    <a class="card-header collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                        Curabitur eget leo at velit imperdiet varius
                        iaculis vitaes?
                    </a>

                    <div id="collapseFive" class="collapse" data-parent="#accordion" style="">
                        <p>Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit. Curabitur eget leo at velit
                            imperdiet varius. In eu ipsum vitae velit
                            congue iaculis vitae at risus. Nullam tortor
                            nunc, bibendum vitae semper a, volutpat eget
                            massa. Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit. Integer
                            fringilla, orci sit amet posuere auctor,
                            orci eros pellentesque odio, nec
                            pellentesque erat ligula nec massa. Aenean
                            consequat lorem ut felis ullamcorper posuere
                            gravida tellus faucibus. Maecenas dolor
                            elit, pulvinar eu vehicula eu, consequat et
                            lacus. Duis et purus ipsum. In auctor mattis
                            ipsum id molestie. Donec risus nulla,
                            fringilla a rhoncus vitae, semper a massa.
                            Vivamus ullamcorper, enim sit amet consequat
                            laoreet, tortor tortor dictum urna, ut
                            egestas urna ipsum nec libero. Nulla justo
                            leo, molestie vel tempor nec, egestas at
                            massa. Aenean pulvinar, felis porttitor
                            iaculis pulvinar, odio orci sodales odio, ac
                            pulvinar felis quam sit.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 px-5">
            <img class="float-right" src="{{ asset('assets/images/faq.png') }}" >
        </div>



    </div>

</div>

@endsection
