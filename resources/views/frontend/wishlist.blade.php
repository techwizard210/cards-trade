@extends('frontend.layout.app')

@section('content')

<main class="main wishlist-page">
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">Wishlist</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav mb-10">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="demo1.html">Home</a></li>
                <li>Wishlist</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    <div class="page-content">
        <div class="container">
            <h3 class="wishlist-title">My wishlist</h3>
            <table class="shop-table wishlist-table">
                <thead>
                    <tr>
                        <th class="product-name"><span>Product</span></th>
                        <th></th>
                        <th class="product-price"><span>Price</span></th>
                        <th class="product-stock-status"><span>Stock Status</span></th>
                        <th class="wishlist-action">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($content as $list)
                    <tr>
                        <td class="product-thumbnail">
                            <div class="p-relative">
                                <a href="#">
                                    <figure>
                                        @if(file_exists(public_path('storage/cards/'.$list->merchant->image)) && !empty($list->merchant->image))
                                        <img src="{{ asset('storage/cards/'.$list->merchant->image) }}" alt="{{ $list->merchant->name }}" width="300" height="338" />
                                        @else
                                        <img src="{{ asset('user-assets/images/default-card.png') }}" width="300px" height="300px" alt="{{ $list->merchant->title }}" />
                                        @endif
                                    </figure>
                                </a>
                                <button type="submit" class="btn btn-close" data-id="{{ $list->id }}"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </td>
                        <td class="product-name">
                            <a href="#">
                                {{ $list->merchant->name }}
                            </a>
                        </td>
                        <td class="product-price">
                            <ins class="new-price">${{ number_format($list->merchant->value, 2) }}</ins>
                        </td>
                        <td class="product-stock-status">
                            <span class="wishlist-in-stock">In Stock</span>
                        </td>
                        <td class="wishlist-action">
                            <div class="d-lg-flex">
                                {{-- <a href="#"
                                    class="btn btn-quickview btn-outline btn-default btn-rounded btn-sm mb-2 mb-lg-0">Quick
                                    View</a> --}}
                                <a href="#" class="btn btn-dark btn-rounded btn-sm ml-lg-2 btn-cart" data-id="{{ $list->merchant->id }}">Add to
                                    cart</a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="5">There is no cards on your wishlist</td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
            <div class="social-links">
                <label>Share On:</label>
                <div class="social-icons social-no-color border-thin">
                    <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                    <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                    <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>
                    <a href="#" class="social-icon social-email far fa-envelope"></a>
                    <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End of PageContent -->
</main>

@endsection

@push('page-script')

<script type="text/javascript">

    $(document).ready(function (){
        $('td.product-thumbnail .btn-close').on('click', function(){
            var i = $(this);
            $.ajax({
                type: "POST",
                url: "{{ route('wishlist.delete') }}",
                data: {
                    product_id: i.attr('data-id')
                },
                headers: {
                    'X-CSRF-Token': $('meta[name=csrf_token]').attr('content')
                },
                success: function (response) {
                    if(response.status == 'error') {
                        toastr['error'](response.message);
                    }
                    else if(response.status == 'success'){
                        toastr['success'](response.message);
                        i.closest( "tr" ).remove();
                    } else {
                        toastr['warning']('Something went wrong, please try again.');
                    }
                },
                error: function(response) {
                    toastr['error']('Server Connection Failed');
                }
            });
        });
    });

</script>

@endpush
