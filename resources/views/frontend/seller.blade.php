@extends('frontend.layout.app')

@section('content')
    <main class="main">

        <section class="search-section pt-10 pb-10"
            style="background-image: url({{ asset('user-assets/images/banner.jpg') }});" style="min-height: 40rem">
            <div class="container">
                <div class="search-name">
                    <h2 class="search-title">
                        Sell your gift cards for cash!</h2>
                    <h4 class="search-info text-white text-center">Find proper offer for your Gift Cards
                    </h4>
                </div>
                <form method="get" action={{ route('offer') }}>
                    <div class="row search-form">
                        <div class="col-md-6 col-lg-6">
                            <div class="select-custom">
                                <select class="form-control mb-0" id="seller-merchant-select" name="cardId">
                                    @foreach ($merchants as $list)
                                        <option value="{{ $list->id }}">{{ $list->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <input type="number" class="form-control form-control-md" name="price"
                                    placeholder="$ Balance" id="price-input" required min="25" max="3000">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-2">
                            <button class="btn btn-borders btn-rounded btn-outline-primary ls-25 btn-block"
                                id="find-offer-btn" type="submit">Find Offer
                                Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <div class="flag_sec bg-gray" style="margin-top: 30px;">
            <div class="container-fluid">
                <h2 class="text-center">We Accept Cards From These Countries.</h2>
                <div class="inr_flag_sec">

                    <div class="row">

                        <div class="col-lg-3 col-md-3 col-sm-3 col-12">

                            <img src="images/USA.jpg" alt="" />

                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 col-12">

                            <img src="images/USA-1.jpg" alt="" />

                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 col-12">

                            <img src="images/USA-2-1.jpg" alt="" />

                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 col-12">

                            <img src="images/USA-3.jpg" alt="" />

                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="how-trade pt-10 pb-5 pb-lg-10">
            <div class="container mt-2 mt-lg-10 mb-0 mb-lg-10">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <figure class="br-sm">
                            <img src="{{ asset('user-assets/images/gift-2.jpg') }}" alt="Banner" width="610"
                                height="520" style="background-color: #C9C8CD;" />
                        </figure>
                    </div>
                    <div class="col-lg-6 pl-lg-8">
                        <h4 class="text-primary font-weight-bold ls-25">FASTEST SERVICE</h4>
                        <h2 class="title text-left">Easy 4 steps to make your Cards selling</h2>
                        <p class="mb-6">We provide fastest service and the best rates in the market for your gift cards.
                            Contact us 24/7 to sell your gift cards online instantly.</p>
                        <div class="row cols-sm-2 mb-1">
                            <div class="stage-item mb-6 stage-register d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    id="Layer_4" x="0px" y="0px" width="70px" height="70px"
                                    viewBox="0 0 70 70" xml:space="preserve">
                                    <g>
                                        <path d="M52.93,12.024H9.712v2.519H52.93V12.024z"></path>
                                        <path d="M60.396,12.024h-3.545v2.519h3.545V12.024L60.396,12.024z"></path>
                                        <path
                                            d="M60.451,8.337H9.549C7.591,8.337,6,9.921,6,11.868v36.039c0,2.048,1.705,3.533,4.053,3.533h18.944v3.346   h-3.866l-5.005,4.916v1.961h29.745v-1.961l-5.004-4.916h-3.863V51.44h19.949c1.408,0,3.047-1.542,3.047-3.533V11.868   C64,9.921,62.408,8.337,60.451,8.337z M31.363,54.786V51.44h7.275v3.346H31.363z M23.897,59.308l2.206-2.166h17.795l2.205,2.166   H23.897z M8.367,45.138h31.084v-2.355H8.367V11.868c0-0.648,0.531-1.178,1.184-1.178h50.901c0.652,0,1.184,0.529,1.184,1.178   v30.914h-2.367v2.355h2.367v2.77c0,0.672-0.543,1.157-0.68,1.18H10.053c-1.042,0-1.688-0.451-1.688-1.18L8.367,45.138L8.367,45.138   z">
                                        </path>
                                        <path d="M54.199,46.572h2.822v-2.521h-2.822V46.572z"></path>
                                        <path d="M48.633,46.572h2.9v-2.521h-2.9V46.572z"></path>
                                        <path d="M43.303,46.572h2.9v-2.521h-2.9V46.572z"></path>
                                        <path
                                            d="M48.947,19.48c-2.846,0-5.16,2.324-5.16,5.178c0,2.856,2.314,5.179,5.16,5.179   c2.844,0,5.156-2.322,5.156-5.179C54.105,21.805,51.791,19.48,48.947,19.48z M48.947,28.009c-1.84,0-3.338-1.502-3.338-3.351   c0-1.847,1.498-3.348,3.338-3.348c1.838,0,3.336,1.501,3.336,3.348C52.283,26.507,50.785,28.009,48.947,28.009z">
                                        </path>
                                        <path
                                            d="M52.502,30.325l-6.861-0.045l-0.281,0.063c-4.881,1.931-5.074,2.276-5.074,2.941v6.433h17.326v-6.433   C57.609,32.622,57.414,32.275,52.502,30.325z M52.045,32.11c1.6,0.639,3.104,1.296,3.742,1.633v4.145H42.105v-4.145   c0.643-0.336,2.152-0.992,3.76-1.633H52.045z">
                                        </path>
                                        <path
                                            d="M30.32,21.914c0,0.693-0.563,1.261-1.253,1.261h-15.71c-0.69,0-1.254-0.566-1.254-1.261l0,0   c0-0.691,0.564-1.259,1.254-1.259h15.71C29.757,20.655,30.32,21.223,30.32,21.914L30.32,21.914z">
                                        </path>
                                        <path
                                            d="M30.32,28.929c0,0.692-0.563,1.26-1.253,1.26h-15.71c-0.69,0-1.254-0.567-1.254-1.26l0,0   c0-0.692,0.564-1.258,1.254-1.258h15.71C29.757,27.671,30.32,28.236,30.32,28.929L30.32,28.929z">
                                        </path>
                                        <path
                                            d="M19.978,34.999c0,0.692-0.565,1.26-1.255,1.26h-5.366c-0.69,0-1.254-0.566-1.254-1.26l0,0   c0-0.692,0.564-1.259,1.254-1.259h5.366C19.413,33.74,19.978,34.307,19.978,34.999L19.978,34.999z">
                                        </path>
                                    </g>
                                </svg>
                                <p class="mb-0 font-weight-bold">We Accept All Major Gift Cards</p>
                            </div>
                            <div class="stage-item mb-6 stage-selling d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    id="Layer_3" x="0px" y="0px" width="70px" height="70px"
                                    viewBox="0 0 70 70" xml:space="preserve">
                                    <g>
                                        <rect x="27.456" y="23.221" width="16.526" height="1.854"></rect>
                                        <rect x="27.456" y="31.354" width="16.526" height="1.854"></rect>
                                        <rect x="27.456" y="39.598" width="16.526" height="1.854"></rect>
                                        <polygon
                                            points="20.892,25.005 18.584,23.058 17.824,23.95 21.042,26.667 25.252,21.568 25.316,21.491    24.408,20.748  ">
                                        </polygon>
                                        <polygon
                                            points="20.892,33.138 18.584,31.19 17.824,32.083 21.042,34.799 25.252,29.701 25.316,29.624    24.408,28.88  ">
                                        </polygon>
                                        <polygon
                                            points="20.892,40.793 18.584,38.846 17.824,39.738 21.042,42.457 25.252,37.355 25.316,37.279    24.408,36.535  ">
                                        </polygon>
                                        <polygon
                                            points="20.892,49.141 18.584,47.191 17.824,48.086 21.042,50.802 25.252,45.704 25.316,45.627    24.408,44.884  ">
                                        </polygon>
                                        <path
                                            d="M52.087,43.391l-0.071-0.021V16.403c0-2.588-2.117-4.693-4.718-4.693h-5.157V9.783h-6.423l-0.015-0.082   c-0.396-2.152-2.25-3.715-4.409-3.715s-4.014,1.563-4.409,3.715L26.87,9.783h-5.423v1.927H15.29c-2.602,0-4.718,2.105-4.718,4.693   v39.351c0,2.588,2.117,4.693,4.718,4.693h23.882l0.03,0.046c2.127,3.313,5.746,5.293,9.68,5.293   c6.333,0,11.486-5.127,11.486-11.431C60.367,49.309,56.962,44.798,52.087,43.391z M28.328,11.294v-0.755   c0-1.677,1.331-3.042,2.966-3.042c1.635,0,2.966,1.364,2.966,3.042v0.756h6.36v4.545H22.968v-4.546H28.328z M38.582,49.316   l-0.068,0.144c-0.742,1.556-1.119,3.202-1.119,4.896c0,1.164,0.176,2.315,0.523,3.424l0.041,0.132H15.29   c-1.194,0-2.166-0.97-2.166-2.155V16.403c0-1.188,0.972-2.155,2.166-2.155h6.157v3.104h20.694v-3.104h5.157   c1.193,0,2.165,0.967,2.165,2.155v26.554l-0.104-0.003c-0.064-0.003-0.129-0.007-0.197-0.013c-0.094-0.006-0.188-0.012-0.281-0.012   c-3.596,0-6.918,1.639-9.115,4.491l-0.029,0.039H27.457v1.854h11.125V49.316z M48.88,63.555c-5.098,0-9.245-4.127-9.245-9.197   c0-5.069,4.147-9.196,9.245-9.196c5.097,0,9.243,4.127,9.243,9.196C58.123,59.428,53.977,63.555,48.88,63.555z">
                                        </path>
                                        <polygon
                                            points="47.646,56.266 44.559,53.249 43.497,54.314 47.749,58.475 48.305,57.832 53.958,51.007    52.791,50.052  ">
                                        </polygon>
                                    </g>
                                </svg>
                                <p class="mb-0 font-weight-bold">App / Zelle / Venmo Ids Available</p>
                            </div>
                            <div class="stage-item mb-5 stage-deliver d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    id="Layer_1" x="0px" y="0px" width="70px" height="70px"
                                    viewBox="0 0 70 70" xml:space="preserve">
                                    <g id="Layer_5">
                                        <path
                                            d="M64.918,27.935c0-2.454-1.994-4.45-4.444-4.45h-8.843c-2.451,0-4.445,1.996-4.445,4.45v8.845   c0,0.738,0.188,1.47,0.535,2.115l0.063,0.109h-1.767c-0.11,0-0.216-0.012-0.31-0.031l-0.058-0.016v-8.214h-1.375l-0.006-0.068   c-0.043-0.45-0.063-0.869-0.063-1.282c0-3.12-2.359-5.877-4.339-7.642l-0.067-0.061l0.072-0.055   c1.821-1.372,2.783-3.536,2.783-6.258c0-4.625-3.761-8.386-8.383-8.386c-2.469,0-4.977,1.066-6.706,2.851   c-1.511,1.561-2.308,3.546-2.244,5.591l0.009,1.09l1.827,0.005l0.007,0.067c0.329,3.367,2.116,5.811,4.779,6.537L32,23.148   l0.006,1.382c0.002,0.481,0.008,1.286-0.004,1.442l-0.004,0.086c0,0.026-0.002,0.055-0.002,0.076l0.006,0.006l-0.01,0.04   c-0.145,0.657-1.443,1.392-2.967,1.392h-5.367l-0.021-0.038c-0.463-0.8-1.485-1.753-3.744-1.753h-2.86v1.791h-0.185   c-0.797,0-1.442,0.648-1.442,1.444v3.683c0,0.624,0.397,1.176,0.992,1.373l0.063,0.021l-0.015,0.065   c-0.063,0.307-0.12,0.657-0.172,1.042c-0.212,1.544-0.329,3.586-0.329,5.75c0,3.607-1.087,5.455-1.52,5.584l-0.109,0.011   c-0.113-0.006-0.215-0.008-0.322-0.008c-4.609,0-8.396,3.462-8.81,8.053l-0.108,1.209H6.5l0.006,0.07   c0.25,4.003,3.59,7.139,7.603,7.139c3.785,0,6.946-2.711,7.519-6.444l0.01-0.063h17.977l0.01,0.063   c0.571,3.733,3.732,6.444,7.52,6.444c3.791,0,6.955-2.711,7.525-6.444l0.01-0.063h1.332V46.151h0.215   c1.164,0,2.109-0.946,2.109-2.111v-0.166c0-1.165-0.945-2.112-2.109-2.112H56.01v-0.53h4.469c2.451,0,4.445-1.996,4.445-4.451   v-8.844L64.918,27.935L64.918,27.935z M32.67,42.358c-0.045,0.972-0.013,2.33,0.022,3.769l0.005,0.175   c0.005,0.176,0.01,0.604,0.016,1.096v0.229h-1.535v-7.509c0-1.551,1.131-2.813,2.521-2.813h9.237l-0.003,0.078   c-0.032,0.854-0.267,1.179-0.438,1.349c-0.021,0.021-0.25,0.242-1.348,0.242c-0.739,0-1.628-0.103-2.411-0.189   c-0.864-0.098-1.521-0.165-2.097-0.167C33.301,38.631,32.819,39.085,32.67,42.358z M32.748,49.923c0,0.191-0.002,0.354-0.006,0.484   l-0.002,0.072h-0.072c-0.941,0.017-2.545,0.022-3.723,0.026l-1.166,0.009v-0.669h4.967L32.748,49.923z M41.984,29.395   c0,1.601,0.288,3.217,0.543,4.642l0.008,0.043c0.053,0.293,0.109,0.604,0.161,0.917l0.015,0.087h-8.56l-0.017-0.052   c-0.09-0.28-0.25-0.901-0.313-1.922l-0.003-0.057l0.053-0.019c2.414-0.855,3.855-2.481,3.855-4.349   c0-1.682-1.414-3.165-3.438-3.604l-0.061-0.013l-0.001-0.06l-0.009-1.646l0.072-0.002c1.217-0.046,2.33-0.235,3.313-0.562   l0.039-0.013l0.03,0.026C38.688,23.637,41.984,26.552,41.984,29.395z M27.619,14.309l0.018-0.089   c0.252-1.294,0.969-2.252,1.522-2.829c1.319-1.362,3.229-2.175,5.112-2.175c3.398,0,6.163,2.765,6.163,6.164   c0,3.518-1.813,5.386-5.542,5.711l-0.082,0.007l0.008-6.792L27.619,14.309z M29.398,16.615l-0.012-0.084h3.203v4.474l-0.097-0.028   C30.811,20.486,29.683,18.897,29.398,16.615z M27.77,30.503c0.16,0.001,0.324,0.002,0.49,0.002c2.67-0.019,4.961-1.285,5.705-3.15   l0.023-0.063l0.063,0.019c0.869,0.252,1.451,0.805,1.451,1.375c0,1.286-2.226,2.727-5.203,2.73   c-0.225-0.016-0.444-0.045-0.734-0.086c-0.378-0.055-0.949-0.138-1.748-0.181l-0.064-0.003l-0.006-0.064   c-0.014-0.153-0.029-0.319-0.054-0.493l-0.013-0.085L27.77,30.503z M24.145,30.267c0.372,0.057,0.779,0.103,1.21,0.138l0.055,0.004   l0.013,0.054c0.041,0.174,0.071,0.368,0.095,0.574l0.009,0.083l-1.35,0.004l-0.015-0.058c-0.042-0.177-0.077-0.418-0.104-0.718   l-0.009-0.095L24.145,30.267z M13.328,54.278V56.5h6.053l-0.021,0.092c-0.558,2.47-2.719,4.195-5.255,4.195   c-2.977,0-5.396-2.423-5.396-5.399c0-0.059,0.015-0.142,0.026-0.229l0.019-0.126c0.014-0.089,0.023-0.171,0.03-0.242l0.106-1.209   H7.612l0.026-0.097c0.82-2.825,3.373-4.726,6.354-4.726c3.213,0,5.952,2.284,6.52,5.431l0.017,0.09h-7.2V54.278L13.328,54.278z    M21.574,50.825c-1.056-1.754-2.691-3.092-4.605-3.771l-0.084-0.029l0.043-0.076c0.787-1.428,1.238-3.61,1.238-5.994   c0-4.424,0.443-6.398,0.532-6.75l0.015-0.057h0.537v-6.141h0.643c1.236,0,1.79,0.41,1.894,0.793l0.005,0.02   c0,0.908,0.016,1.946,0.221,2.772l0.012,0.049l-0.041,0.03c-0.475,0.348-0.736,0.833-0.736,1.365v15.512   c0,0.79,0.16,1.556,0.465,2.209L21.574,50.825z M23.379,52.567c-0.025,0.197-0.025,0.371-0.025,0.484v1.227H22.77l-0.01-0.064   c-0.131-0.993-0.428-1.949-0.881-2.843l0.129-0.075c0.352,0.538,0.811,0.95,1.328,1.193l0.049,0.021L23.379,52.567z M25.559,50.522   h-1.098c-0.406,0-0.998-0.771-0.998-1.978V33.387l0.059-0.014c0.098-0.022,0.209-0.034,0.332-0.034h2.816   c1.25,0,1.996,0.105,2.596,0.19c0.341,0.049,0.609,0.084,0.963,0.106c0.438,0,0.886-0.026,1.324-0.076l0.076-0.008l0.008,0.076   c0.062,0.669,0.158,1.259,0.291,1.753l0.017,0.063l-0.06,0.026c-1.752,0.771-2.928,2.64-2.928,4.649v7.509h-1.144   c-1.244,0-2.257,0.911-2.257,2.03L25.559,50.522L25.559,50.522z M52.532,54.278v1.107c0,2.979-2.421,5.399-5.396,5.399   c-2.536,0-4.697-1.728-5.256-4.195l-0.021-0.092h6.052v-2.222h-7.668l0.017-0.088c0.565-3.256,3.389-5.619,6.709-5.619   c3.322,0,6.144,2.363,6.709,5.619l0.016,0.088h-1.161V54.278z M53.781,41.762h-7.488c-1.164,0-2.11,0.947-2.11,2.112v0.166   c0,1.165,0.946,2.111,2.11,2.111h7.488v3.297l-0.131-0.146c-1.693-1.875-4.13-2.951-6.682-2.951c-4.521,0-8.373,3.381-8.959,7.862   l-0.008,0.065H25.571v-1.225c0-0.057,0-0.124,0.004-0.172l0.005-0.051l0.049-0.016c0.11-0.033,0.266-0.056,0.457-0.062   c0.111-0.004,0.315-0.008,0.594-0.012c0.404-0.005,0.949-0.009,1.547-0.011l0.73-0.004c1.205-0.004,2.146-0.013,2.858-0.019h0.021   l4.474,0.03V42.288c0-0.538,0.196-0.922,0.321-1.037l0.021-0.021h8.938l0.166-0.01c0.093,0.006,0.174,0.01,0.261,0.01h7.767   L53.781,41.762L53.781,41.762z M62.698,36.78c0,1.228-0.999,2.226-2.228,2.226h-8.84c-1.229,0-2.229-0.998-2.229-2.226v-2.063   h13.295L62.698,36.78L62.698,36.78z M62.698,32.498H49.403v-1.993h13.295V32.498z M62.698,28.283H49.403v-0.349   c0-1.228,0.999-2.228,2.228-2.228h8.842c1.229,0,2.228,1,2.228,2.228L62.698,28.283L62.698,28.283z">
                                        </path>
                                    </g>
                                </svg>
                                <p class="mb-0 font-weight-bold">Fast Payment instantly within 30min to 1 hour.</p>
                            </div>
                            <div class="stage-item mb-5 stage-get d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    id="Layer_2" x="0px" y="0px" width="70px" height="70px"
                                    viewBox="0 0 70 70" xml:space="preserve">
                                    <g>
                                        <path
                                            d="M11.3,54.3H41V37.4H11.3V54.3z M32.6,40h5.9v11.8h-5.9V40z M22.9,40H30v11.8h-7.1V40z M13.8,40h6.5v11.8   h-6.5V40z">
                                        </path>
                                        <path
                                            d="M68.4,23.6c-0.2-0.4-0.4-0.9-0.7-1.4L63,11.8l-0.1-0.2c-1.2-1.7-2.7-2.1-3.7-2.1l-48.3,0   c-1.6,0-3.4,1.6-3.9,2.7l-4.6,10c-0.2,0.5-0.4,0.9-0.6,1.3c-0.9,2-1.7,3.6-1.7,5.2l0,0.2c0.5,3.8,3.3,6.4,7.1,6.9V58   c0,1.4,1.1,2.5,2.6,2.5h52.3c1.4,0,2.6-1.1,2.6-2.5V35.4c2.9-0.5,5-2.9,5.5-6.3l0-0.2C70,27,69.4,25.8,68.4,23.6z M36.9,12l10.3,0   l3.3,15.8c-0.2,2.9-3,5.2-6.4,5.2c-4,0-7.3-2.5-7.3-5.5L36.9,12z M34.3,12v15.5l0,0c0,3-3.3,5.5-7.4,5.5c-3.6,0-6.5-2.3-6.8-5.1   L23.4,12L34.3,12z M8.4,33.4c-3.1,0-5.4-1.8-5.8-4.8c0-1.1,0.7-2.4,1.4-4.1c0.2-0.4,0.4-0.9,0.6-1.3l4.6-10.1   c0.2-0.4,1.2-1.2,1.5-1.2l10,0l-3.2,15.5h-0.1c0,0.2,0,0.4,0,0.6l0,0.1h0C16.9,31.2,13,33.4,8.4,33.4z M56.8,57.9H46.7V40h10.1   V57.9z M61.9,58h-2.6V37.4H44.2V58H9.7V35.9c3.9-0.3,7.3-2,9-4.5c1.6,2.4,4.7,4.1,8.2,4.1c3.7,0,7-1.7,8.7-4.1   c1.7,2.4,4.9,4.1,8.6,4.1c3.4,0,6.4-1.7,7.9-4.2c1.9,2.3,5.6,3.9,9.9,4.2V58z M63.2,33c-5.5,0-10.1-2.5-10.1-5.5h-0.1L49.8,12   l9.3,0c0.4,0,1,0.1,1.5,0.9l4.7,10.3c0.2,0.5,0.5,1,0.7,1.4c0.9,1.9,1.3,2.9,1.4,4.2C67.1,31.5,65.5,33,63.2,33z">
                                        </path>
                                    </g>
                                </svg>
                                <p class="mb-0 font-weight-bold">Get Payments by BTC or Your Local Currency</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Row -->
            </div>
            <!-- End of Container -->
        </div>

        <section class="main-reason-section float-bg lazy-bg"
            style="background-image: url({{ asset('user-assets/landing/images/reasons/reason-bg.jpg') }});
    background-color: #3064e9; background-position: 0 0; background-size: 110%;">
            <div class="container">
                <div class="row mb-6">
                    <div class="animated-ellipses col-xl-5">
                        <div class="ellipse"></div>
                        <div class="ellipse"></div>
                        <div class="ellipse"></div>
                        <div class="ellipse"></div>
                        <div class="count-wrapper appear-animate"
                            data-animation-options="{
                        'name': 'blurIn', 'delay': '.4s'
                    }">
                            <label class="text-gradient">4</label>
                        </div>
                        <div class="text-reasons">
                            <h3 class="text-white text-uppercase font-weight-bolder mb-2 appear-animate"
                                data-animation-options="{
                            'name': 'fadeInLeftShorter', 'delay': '.4s'
                        }">
                                Steps</h3>
                            <h3 class="text-white text-uppercase font-weight-bolder mb-2 appear-animate"
                                data-animation-options="{
                            'name': 'fadeInLeftShorter', 'delay': '.8s'
                        }">
                                How you sell GIFT CARDS
                            </h3>
                            <h3 class="text-white text-uppercase font-weight-bolder mb-0 appear-animate"
                                data-animation-options="{
                            'name': 'fadeInLeftShorter', 'delay': '1.2s'
                        }">
                                CardsTrade</h3>
                        </div>
                    </div>
                    <div class="col-xl-6 pl-9 pr-10 pt-4 appear-animate"
                        data-animation-options="{
                    'name': 'fadeIn', 'delay': '.5s'
                }">
                        <h3 class="text-white text-capitalize font-weight-bolder ls-10 lh-1 mt-2">How it Works?</h3>
                        <p class="text-white ">We offer the fastest services in the market. Your payment will be
                            transferred within 30Min-2hours(Depending on the card type) after the card is verified.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-11 col-lg-12 mx-md-auto">
                        <div class="timeline">
                            <div class="timeline-body">
                                <article class="timeline-box left">
                                    <div class="timeline-content">
                                        <h2 class="font-weight-bolder text-dark appear-animate"
                                            data-animation-options="{
                                        'name': 'zoomIn', 'delay': '.2s'
                                    }">
                                            STEP 01.</h2>
                                        <h4 class="timeline-title text-white appear-animate"
                                            data-animation-options="{
                                        'name': 'fadeInRightShorter', 'delay': '.3s'
                                    }">
                                            Contact Us</h4>
                                        <div class="appear-animate"
                                            data-animation-options="{
                                        'name': 'fadeInRightShorter', 'delay': '.4s'
                                    }">
                                            <p class="mb-0 text-white">Contact us and One of our representative will assist
                                                you at the earliest.</p>
                                        </div>
                                    </div>
                                    <span class="timeline-node appear-animate"
                                        data-animation-options="{
                                    'name': 'fadeInUpShorter', 'delay': '.2s'
                                }">
                                        <img src="{{ asset('user-assets/landing/images/reasons/step1-386x150.png') }}"
                                            width="386" height="150" alt="Timeline Node">
                                    </span>
                                </article>
                                <!-- End of Timeline Box -->

                                <article class="timeline-box right">
                                    <div class="timeline-content">
                                        <h2 class="font-weight-bolder text-dark appear-animate"
                                            data-animation-options="{
                                        'name': 'zoomIn', 'delay': '.2s'
                                    }">
                                            STEP 02.</h2>
                                        <h4 class="timeline-title text-white appear-animate"
                                            data-animation-options="{
                                        'name': 'fadeInLeftShorter', 'delay': '.2s'
                                    }">
                                            Share Card Details</h4>
                                        <div class="appear-animate"
                                            data-animation-options="{
                                        'name': 'fadeInLeftShorter', 'delay': '.2s'
                                    }">
                                            <p class="mb-0 text-white">Confirm the Gift Card name and the amount on the
                                                Card. Our representative will share the best offer for your card and the
                                                payment method by which you want us to pay.</p>
                                        </div>
                                    </div>
                                    <span class="timeline-node appear-animate"
                                        data-animation-options="{
                                    'name': 'fadeInUpShorter', 'delay': '.2s'
                                }">
                                        <img src="{{ asset('user-assets/landing/images/reasons/step2-386x150.png') }}"
                                            alt="Timeline Node" width="386" height="150">
                                    </span>
                                </article>
                                <!-- End of Timeline Box -->

                                <article class="timeline-box left">
                                    <div class="timeline-content">
                                        <h2 class="font-weight-bolder text-dark appear-animate"
                                            data-animation-options="{'name': 'zoomIn', 'delay': '.2s'}">STEP 03.</h2>
                                        <h4 class="timeline-title text-white appear-animate"
                                            data-animation-options="{
                                        'name': 'fadeInRightShorter', 'delay': '.3s'
                                    }">
                                            Verify Cards</h4>
                                        <div class="appear-animate"
                                            data-animation-options="{
                                        'name': 'fadeInRightShorter', 'delay': '.4s'
                                    }">
                                            <p class="mb-0 text-white"> If you agree with our offer then our representative
                                                will ask you to share the card images, receipt, or the e-code. We will then
                                                verify the card balance.</p>
                                        </div>
                                    </div>
                                    <span class="timeline-node appear-animate"
                                        data-animation-options="{
                                    'name': 'fadeInUpShorter', 'delay': '.3s'
                                }">
                                        <img src="{{ asset('user-assets/landing/images/reasons/step3-386x150.png') }}"
                                            alt="Timeline Node" width="386" height="150">
                                    </span>
                                </article>
                                <!-- End of Timeline Box -->

                                <article class="timeline-box right">
                                    <div class="timeline-content">
                                        <h2 class="font-weight-bolder text-dark appear-animate"
                                            data-animation-options="{
                                        'name': 'zoomIn', 'delay': '.2s'
                                    }">
                                            STEP 04.</h2>
                                        <h4 class="timeline-title text-white appear-animate"
                                            data-animation-options="{
                                        'name': 'fadeInLeftShorter', 'delay': '.3s'
                                    }">
                                            Payment Done
                                        </h4>
                                        <div class="appear-animate"
                                            data-animation-options="{
                                        'name': 'fadeInLeftShorter', 'delay': '.4s'
                                    }">
                                            <p class="mb-0 text-white">Once we verify the card we will transfer the payment
                                                through the payment method you want within 30 minutes.</p>
                                        </div>
                                    </div>
                                    <span class="timeline-node appear-animate"
                                        data-animation-options="{
                                    'name': 'fadeInUpShorter', 'delay': '.3s'
                                }">
                                        <img src="{{ asset('user-assets/landing/images/reasons/step4-386x150.png') }}"
                                            alt="Timeline Node" width="386" height="150">
                                    </span>
                                </article>
                                <!-- End of Timeline Box -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="category-classic-section pt-10 pb-10">
            <div class="container mt-1 mb-2">
                <h1 class="title title-center mb-5" style="font-size: 4rem">High Price Cards (Physical with Receipt)</h1>
                <div class="swiper-container swiper-theme show-code-action"
                    data-swiper-options="{
                'spaceBetween': 20,
                'slidesPerView': 2,
                'breakpoints': {
                    '576': {
                        'slidesPerView': 3
                    },
                    '768': {
                        'slidesPerView': 4
                    },
                    '992': {
                        'slidesPerView': 5
                    },
                    '1200': {
                        'slidesPerView': 6
                    }
                }
            }">
                    <div class="swiper-wrapper row cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2">
                        <div class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                            <a href="shop-banner-sidebar.html">
                                <figure class="category-media">
                                    <img src="{{ asset('user-assets/images/cards/apple.png') }}" alt="Category"
                                        width="190" height="184" />
                                </figure>
                            </a>
                            <div class="category-content">
                                <h4 class="category-name">Apple</h4>
                                <a href="#" class="btn btn-primary btn-link btn-underline">Sell Now</a>
                            </div>
                        </div>
                        <div class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                            <a href="#">
                                <figure class="category-media">
                                    <img src="{{ asset('user-assets/images/cards/vanilla.png') }}" alt="Category"
                                        width="190" height="184" />
                                </figure>
                            </a>
                            <div class="category-content">
                                <h4 class="category-name">Vanilla Visa</h4>
                                <a href="#" class="btn btn-primary btn-link btn-underline">Sell Now</a>
                            </div>
                        </div>
                        <div class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                            <a href="#">
                                <figure class="category-media">
                                    <img src="{{ asset('user-assets/images/cards/onevanilla.png') }}" alt="Category"
                                        width="190" height="184" />
                                </figure>
                            </a>
                            <div class="category-content">
                                <h4 class="category-name">One Vanilla</h4>
                                <a href="#" class="btn btn-primary btn-link btn-underline">Sell Now</a>
                            </div>
                        </div>
                        <div class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                            <a href="shop-banner-sidebar.html">
                                <figure class="category-media">
                                    <img src="{{ asset('user-assets/images/cards/american_express.png') }}"
                                        alt="Category" width="190" height="184" />
                                </figure>
                            </a>
                            <div class="category-content">
                                <h4 class="category-name">American Express</h4>
                                <a href="#" class="btn btn-primary btn-link btn-underline">Sell Now</a>
                            </div>
                        </div>
                        <div class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                            <a href="#">
                                <figure class="category-media">
                                    <img src="{{ asset('user-assets/images/cards/macys.png') }}" alt="Category"
                                        width="190" height="184" />
                                </figure>
                            </a>
                            <div class="category-content">
                                <h4 class="category-name">Macy</h4>
                                <a href="#" class="btn btn-primary btn-link btn-underline">Sell Now</a>
                            </div>
                        </div>
                        <div class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                            <a href="#">
                                <figure class="category-media">
                                    <img src="{{ asset('user-assets/images/cards/sephora.png') }}" alt="Category"
                                        width="190" height="184" />
                                </figure>
                            </a>
                            <div class="category-content">
                                <h4 class="category-name">Sephora</h4>
                                <a href="#" class="btn btn-primary btn-link btn-underline">Sell Now</a>
                            </div>
                        </div>
                        <div class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                            <a href="#">
                                <figure class="category-media">
                                    <img src="{{ asset('user-assets/images/cards/target.png') }}" alt="Category"
                                        width="190" height="184" />
                                </figure>
                            </a>
                            <div class="category-content">
                                <h4 class="category-name">Target</h4>
                                <a href="#" class="btn btn-primary btn-link btn-underline">Sell Now</a>
                            </div>
                        </div>
                        <div class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                            <a href="shop-banner-sidebar.html">
                                <figure class="category-media">
                                    <img src="{{ asset('user-assets/images/cards/steam.png') }}" alt="Category"
                                        width="190" height="184" />
                                </figure>
                            </a>
                            <div class="category-content">
                                <h4 class="category-name">Steam</h4>
                                <a href="#" class="btn btn-primary btn-link btn-underline">Sell Now</a>
                            </div>
                        </div>
                        <div class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                            <a href="#">
                                <figure class="category-media">
                                    <img src="{{ asset('user-assets/images/cards/amazon.png') }}" alt="Category"
                                        width="190" height="184" />
                                </figure>
                            </a>
                            <div class="category-content">
                                <h4 class="category-name">Amazon</h4>
                                <a href="#" class="btn btn-primary btn-link btn-underline">Sell Now</a>
                            </div>
                        </div>
                        <div class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                            <a href="shop-banner-sidebar.html">
                                <figure class="category-media">
                                    <img src="{{ asset('user-assets/images/cards/google_play.png') }}" alt="Category"
                                        width="190" height="184" />
                                </figure>
                            </a>
                            <div class="category-content">
                                <h4 class="category-name">Google Play</h4>
                                <a href="#" class="btn btn-primary btn-link btn-underline">Sell Now</a>
                            </div>
                        </div>
                        <div class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                            <a href="shop-banner-sidebar.html">
                                <figure class="category-media">
                                    <img src="{{ asset('user-assets/images/cards/ebay.png') }}" alt="Category"
                                        width="190" height="184" />
                                </figure>
                            </a>
                            <div class="category-content">
                                <h4 class="category-name">Ebay</h4>
                                <a href="#" class="btn btn-primary btn-link btn-underline">Sell Now</a>
                            </div>
                        </div>
                        <div class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                            <a href="#">
                                <figure class="category-media">
                                    <img src="{{ asset('user-assets/images/cards/bestbuy.png') }}" alt="Category"
                                        width="190" height="184" />
                                </figure>
                            </a>
                            <div class="category-content">
                                <h4 class="category-name">Best Buy</h4>
                                <a href="#" class="btn btn-primary btn-link btn-underline">Sell Now</a>
                            </div>
                        </div>
                        <div class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                            <a href="#">
                                <figure class="category-media">
                                    <img src="{{ asset('user-assets/images/cards/nordstorm.png') }}" alt="Category"
                                        width="190" height="184" />
                                </figure>
                            </a>
                            <div class="category-content">
                                <h4 class="category-name">Nordstorm</h4>
                                <a href="#" class="btn btn-primary btn-link btn-underline">Sell Now</a>
                            </div>
                        </div>
                        <div class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                            <a href="#">
                                <figure class="category-media">
                                    <img src="{{ asset('user-assets/images/cards/footlocker.png') }}" alt="Category"
                                        width="190" height="184" />
                                </figure>
                            </a>
                            <div class="category-content">
                                <h4 class="category-name">FootLocker</h4>
                                <a href="#" class="btn btn-primary btn-link btn-underline">Sell Now</a>
                            </div>
                        </div>
                        <div class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                            <a href="#">
                                <figure class="category-media">
                                    <img src="{{ asset('user-assets/images/cards/111.png') }}" alt="Category"
                                        width="190" height="184" />
                                </figure>
                            </a>
                            <div class="category-content">
                                <h4 class="category-name">Saks Fifth Avenue</h4>
                                <a href="#" class="btn btn-primary btn-link btn-underline">Sell Now</a>
                            </div>
                        </div>
                        <div class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                            <a href="#">
                                <figure class="category-media">
                                    <img src="{{ asset('user-assets/images/cards/jcpenny.png') }}" alt="Category"
                                        width="190" height="184" />
                                </figure>
                            </a>
                            <div class="category-content">
                                <h4 class="category-name">JcPenny Sephora</h4>
                                <a href="#" class="btn btn-primary btn-link btn-underline">Sell Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>

        <section class="cta-section sale-banner-section container mb-10 mt-6 pt-1">
            <div class="sale-banner banner br-sm show-code-action">
                <div class="banner-content">
                    <h4 class="content-left banner-subtitle text-uppercase mb-8 mb-md-0 mr-0 mr-md-4 text-white ls-25">
                        <span class="ls-normal">High
                            <br>Price</span>Cards!
                    </h4>
                    <div class="content-right">
                        <h3 class="banner-title text-uppercase font-weight-normal mb-4 mb-md-0 ls-25 text-dark">
                            <span>We Buy
                                <strong class="mr-10 pr-lg-10">ALL MAJOR GIFT CARDS</strong>
                                Just Get in touch
                                <strong class="mr-10 pr-lg-10">with us</strong>
                                to get
                                <strong class="mr-10 pr-lg-10">the best price</strong>
                            </span>
                        </h3>
                        <a href="#" class="btn btn-dark btn-rounded">Sell Now
                            <i class="w-icon-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="seller-reviews container mb-10">
            <h2 class="title title-center mb-5">Seller Reviews</h2>
            <div class="swiper-container shadow-swiper swiper-theme show-code-action"
                data-swiper-options="{
            'slidesPerView': 1,
            'spaceBetween': 20,
            'breakpoints': {
                '576': {
                    'slidesPerView': 2
                },
                '992': {
                    'slidesPerView': 3
                }
            }
        }">
                <div class="swiper-wrapper row cols-lg-3 cols-sm-2 cols-1">
                    <div class="swiper-slide testimonial-wrap">
                        <div class="testimonial testimonial-centered testimonial-shadow">
                            <div class="testimonial-info">
                                <figure class="testimonial-author-thumbnail">
                                    <img src="{{ asset('user-assets/images/customers/su.jpg') }}" class="rounded-circle"
                                        alt="Testimonial" width="100" height="100" />
                                </figure>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%;"></span>
                                    </div>
                                </div>
                            </div>
                            <blockquote>
                                There service is fantastic. Fast response and very good rate.
                            </blockquote>
                            <cite>
                                Adam Moore<span>Texas</span>
                            </cite>
                        </div>
                    </div>
                    <div class="swiper-slide testimonial-wrap">
                        <div class="testimonial testimonial-centered testimonial-shadow">
                            <div class="testimonial-info">
                                <figure class="testimonial-author-thumbnail">
                                    <img src="{{ asset('user-assets/images/customers/wom.jpg') }}" alt="Testimonial"
                                        width="100" height="100" />
                                </figure>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%;"></span>
                                    </div>
                                </div>
                            </div>
                            <blockquote>
                                I wanted to sell my $500 apple gift card but was unable to find a buyer. This is the best
                                place to sell your gift card. I got 85% of the value of my card. Thank you so much.
                            </blockquote>
                            <cite>
                                Mila Kunis<span>Utah</span>
                            </cite>
                        </div>
                    </div>
                    <div class="swiper-slide testimonial-wrap">
                        <div class="testimonial testimonial-centered testimonial-shadow">
                            <div class=" testimonial-info">
                                <figure class="testimonial-author-thumbnail">
                                    <img src="{{ asset('user-assets/images/customers/ol.jpg') }}" alt="Testimonial"
                                        width="100" height="100" />
                                </figure>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%;"></span>
                                    </div>
                                </div>
                            </div>
                            <blockquote>
                                I sold my Ebay Gift card and the response time was fast and they sent the payment within 20
                                minutes to my cash app. I dint knew that this is possible. Highly recommended.
                            </blockquote>
                            <cite>
                                Mike Sendler<span>Ohio</span>
                            </cite>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </section>

        <div class="form_sec" style="display:none;">

            <div class="form_container">

                <h2 class="text-center">Get best offer for your Gift Card.</h2>

                <form>

                    <label>Gift Card Name <span class="required">*</span></label><br />

                    <input type="text" name="" required="required" placeholder="Enter your gift card name" />

                    <label>Amount <span class="required">*</span></label><br />

                    <input type="text" name="" required="required" placeholder="Gift card denomination" />

                    <label>Email <span class="required">*</span></label><br />

                    <input type="email" name="" required="required" placeholder="Email Address" />

                    <label>Phone <span class="required">*</span></label><br />

                    <input type="number" name="" required="required" placeholder="Phone Number" />

                    <input type="submiit" name="" value="Get Offer">

                </form>

            </div>

        </div>



        <!-- The Find Order Now Modal -->

        <div id="findOrderModal" class="modal">



            <div class="modal-content">

                <span class="close">&times;</span>

                <div class="redeem_btn" style="display:none;">

                    <div class="redeem_btn_loading btn-center" style="color: black;">

                        <img src="images/loading1.gif" alt="" style="width: 52px;" /> We will give you best
                        choises.

                    </div>

                    <ul>

                        <form id="btnListFormSub" method="post" class="btn-list">

                            <h5>How Would You Like To Get Paid?</h5>

                            <input type="hidden" name="merchant_name" class="merchant_name" />

                            <input type="hidden" name="price" class="merchant_price" />

                            <li><input type="button" name="physical_check" value="Physical Check" class="redeem1"
                                    id="b1" /></li>

                            <li><input type="button" title="Paypal Transfer is not offered for First Time customers"
                                    name="paypal" value="Paypal" class="paypalSub" id="b2_paypal" /></li>

                            <!---li class="hid-para" ><p>Paypal Transfer is not offered for First Time customers</p></li------------>

                            <li><input type="button" name="bitcoin" value="Bitcoin" class="redeem2" id="b3" />
                            </li>

                        </form>

                    </ul>

                </div>

            </div>



        </div>
    </main>
@endsection

@push('page-script')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#seller-merchant-select").select2({});
            $("#find-offer-btn").click(function() {
                if ($("#price-input").val() < 25 || $("#price-input").val() > 3000) {
                    toastr.error("Please enter valid price");
                }
            });
        });
    </script>
@endpush
