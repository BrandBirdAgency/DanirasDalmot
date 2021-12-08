@extends('layouts.app')
@if(request()->is('products'))
@section('title', 'Products')
@endif

@section('css')
<!-- Swiper Js -->
<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<link rel="stylesheet" href={{ asset('assets/css/style.min.css') }} />
@if($id!= null)
<link rel="canonical" href="{{url('')}}/products">
@else
<link rel="canonical" href="{{url('')}}/products/{{$id}}">
@endif
@endsection

@section('content')

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v12.0"
    nonce="D7itjLeS"></script>

<!-- MAIN BANNER -->
<div class="teambanner">
    <div class="contain">
        <div class="image">
            <img src={{ asset('assets/images/bg.jpg') }} alt="" />
        </div>
        <div class="image-overlay"></div>
        <div class="text">
            <div class="headings">
                <h1 class="">NEW / POPULAR PRODUCTS</h1>
                <div class="bannerline"></div>
            </div>
            <div class="bannernav">
                <li><i class="fas fa-home"></i></li>
                <li><a href={{ route('homepage') }}>HOME</a></li>
                <li><i class="fas fa-caret-right"></i></li>
                <li><a href={{ route('productpage') }}>PRODCUTS</a></li>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN BANNER -->

<!-- PRODUCT DETAILS -->
<div class="maindiv">
    <section id="display-product" style="width: 100%;">
        @foreach ($products as $p)
        @if ($p->id == $id)
        {{-- Meta Tags --}}
        @if(request()->is('products/*'))
        @section('title', $p->name)
        @endif
        @section('meta_desc',Str::substr($p->description, 0, 160).'...')
        @section('meta_img','https://danirasdalmoth.com/storage'.substr($p->photo,6))
        @section('url',url()->current())

        {{-- Meta Tags ENd --}}
        <div class="product-main">
            <div class="product-image" data-tilt>
                <img src="{{ Storage::url($p->photo) }}" alt="product" />
            </div>
            <div class="product-details">
                <div class="product-name">
                    <h2>{{ $p->name }}</h2>
                    @if ($p->in_stock)
                    <div class="status"></div>
                    @else
                    <div class="status" style="background-color: red !important"></div>
                    @endif
                </div>
                <div class="product-rating">
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <p>(5.0)</p>
                </div>
                <div class="product-info">
                    <p class="text-justify">
                        {{ $p->description }}
                    </p>
                </div>
                <div class="product-count row">
                    <div class="counter col-12">
                        ✔ <p class="ml-1">Size:</p>
                        &nbsp;{{ $p->size }} gram
                    </div>
                    <div class="counter col-12">
                        ✔ <p class="ml-1">Price:</p>
                        &nbsp;<del class="text-muted mr-1">
                            Rs.{{ $p->retail_price }}</del>Rs.{{ $p->price }}
                    </div>
                </div>

                <div class="text-right">
                    @if ($p->in_stock)
                    <button data-toggle="modal" data-target="#myModal">Buy</button>
                    @else
                    <button disabled="disabled">Out of Stock</button>
                    @endif
                </div>

                <div class="line"></div>
                <div class="share-product">
                    <p>Share on</p>
                    <div class="icons">
                        <div class="fb-share-button" data-href="https://danirasdalmoth.com/products/{{ $p->id }}"
                            data-layout="button" data-size="small"><a target="_blank"
                                href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdanirasdalmoth.com%2Fproducts%2F{{ $p->id }}&amp;src=sdkpreparse"
                                class="fb-xfbml-parse-ignore">Share</a></div>
                        <a target="_blank" href="https://twitter.com/share?ref_src=twsrc%5Etfw"
                            class="twitter-share-button" data-url="https://danirasdalmoth.com/products/{{ $p->id }}"
                            data-hashtags="danirasdalmoth" data-show-count="false">Tweet</a>
                        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                </div>
            </div>

            <!-- The Modal -->
            <div class="modal fade mt-5" id="myModal">
                <div class="modal-dialog modal-dialog-scrollable mt-5">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h3 class="modal-title h4">Delivery Information</h3>
                            <button type="button" class="close" data-dismiss="modal" class="text-dark">
                                &times;
                            </button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action={{ route('productorder') }} method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value={{ $p->id }}>
                                <input type="hidden" name="product_name" value={{ $p->name}}>
                                <input type="hidden" name="price" value={{ $p->price }}>
                                <div class="form-group">
                                    <label for="usr">Full Name:</label>
                                    <input type="text" class="form-control" id="usr" name="name" required />
                                    @error('name')
                                    <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="District">District:</label>
                                        <input type="text" class="form-control" id="District" name="district"
                                            required />
                                        @error('district')
                                        <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="WardNo">Ward No:</label>
                                        <input type="number" class="form-control" id="WardNo" name="ward_no" required />
                                        @error('ward_no')
                                        <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Address">Address:</label>
                                    <input type="text" class="form-control" id="Address" name="address" required />
                                    @error('address')
                                    <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="Quantity">Quantity:</label>
                                        <input type="number" class="form-control" id="Quantity" name="quantity"
                                            required />
                                        @error('quantity')
                                        <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="Phone">Mobile Number:</label>
                                        <input type="text" class="form-control" id="Phone" name="phone" required />
                                        @error('phone')
                                        <div class="text-danger small">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Email">Email:</label>
                                    <input type="email" class="form-control" id="Email" name="email" required />
                                    @error('email')
                                    <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group text-danger p-1 text-center mt-3 ">
                                    <p>[Note: We only accepts bulk orders]</p>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="submit-btn">Proceed</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    @endforeach
    <!-- More Products -->
    <section id="more-products" class="normalsec">
        <div class="main">
            <div class="title">
                <h3>More Products</h3>
                <div class="line"></div>
            </div>

            <!-- Slider main container -->
            <div class="swiper images">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @forelse ($products as $p)
                    <div class="swiper-slide">
                        <div class="image">
                            <img src="{{ Storage::url($p->photo) }}" alt="product" class="slider-image" />
                            <div class="overlay-image">
                                <a href={{ route('productpage', ['id'=> $p->id]) }}> <button
                                        class="view">View</button></a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="no-content">
                        <h4>Products Unavailable</h4>
                    </div>
                    @endforelse
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <section class="normalsec">
        <div class="infrastructure">
            <div class="title">
                <h3>Our Infrastructures</h3>
                <div class="line"></div>
            </div>
            <div class="row det">
                <div class="col-md-6 col-12 d-md-block d-none">
                    <img src={{ asset('assets/images/infra1.jpg') }} alt="" class="img-fluid" />
                </div>
                <div class="col-md-6 col-12">
                    <div class="content">
                        <div class="heading">
                            <h3>Fully Automated Plant</h3>
                            <div class="line"></div>
                        </div>
                        <p>
                            <i><q>All that we humans have achieved until now be it our space
                                    outreach or the most advanced automation, it is due to the
                                    power of our minds,</q></i>
                            For each production facility to play its part in the automation
                            it has to demonstrate the highest possible degree
                            of automation, availability, and optimization.
                            <br /><br />
                            Here in Danir's We are equiped with fully automated parts and machineries.
                            We ensure the quality, healthy, trust worthy product for our customers. Even
                            though automated aren’t exactly a new sight in factories, there are constantly
                            new and innovative ways in which they are used which we take advantange of!
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-12 d-md-none">
                    <img src={{ asset('assets/images/infra1.jpg') }} alt="" class="img-fluid" />
                </div>
            </div>
            <div class="row det">
                <div class="col-md-6 col-12">
                    <div class="content">
                        <div class="heading">
                            <h3>In - House Logistics</h3>
                            <div class="line"></div>
                        </div>

                        <p>
                            In-house logistics have become an essential ingredient in manufacturing –
                            integrating production processes
                            with the supply chain. We in danira's have a dedicated team of logistics
                            experts who are well versed in the logistics industry. In-house logistics
                            are a key part of our business
                            model.
                            <br /><br />
                            Our in-house logisics professionals can identify your true pain points
                            and then tailor logistics solutions to integrate with our
                            national level network. Maintaining the highest levels of quality.!
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <img src={{ asset('assets/images/infra2.jpg') }} alt="" class="img-fluid" />
                </div>
            </div>
            <div class="row det">
                <div class="col-md-6 col-12 d-md-block d-none">
                    <img src={{ asset('assets/images/infra3.jpg') }} alt="" class="img-fluid" />
                </div>
                <div class="col-md-6 col-12">
                    <div class="content">
                        <div class="heading">
                            <h3>Print & Packaging Plant</h3>
                            <div class="line"></div>
                        </div>

                        <p>
                            We have a dedicated team of printing and packaging experts who are well versed in the
                            printing and
                            packaging industry.
                            <br /><br />
                            Printing & Packaging is an area of high growth, supported with investments in technology and
                            equipment
                            from world class suppliers. We have a completely integrated solution for laminates from
                            In-house Blown
                            Film, Cast film,
                            Specialty pouching and bag making. This is backed by in house cylinder
                            making and pre press support.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-12 d-md-none">
                    <img src={{ asset('assets/images/infra3.jpg') }} alt="" class="img-fluid" />
                </div>
            </div>
            <div class="row det">
                <div class="col-md-6 col-12">
                    <div class="content">
                        <div class="heading">
                            <h3>Environment Friendly</h3>
                            <div class="line"></div>
                        </div>

                        <p>
                            Global warming is becoming the topic of discussion in many forums and on social media
                            platforms. That's
                            why we recycle waste and use it to make new products, use renewable energy and reduce our
                            carbon
                            footprint, use smart manufacturing system ,all in a way that is sustainable.
                            <br /><br />
                            We are committed to reduce our carbon footprint and we are working hard to achieve this. We
                            in danira's
                            are focused on delivering products that are environmentally friendly and healthy.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <img src={{ asset('assets/images/infra4.jpg') }} alt="" class="img-fluid" />
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('js')
<script src={{ asset('vendor/js/bootstrap.bundle.js') }}></script>
<script>
    let count = document.querySelector(".count");
    let minus = document.querySelector(".minus");
    let plus = document.querySelector(".plus");
    let quantity = document.querySelector("#quantity");
    let counter = 1;
    quantity.value = 1;

    minus.addEventListener("click", () => {
        if (counter <= 0) {
            count.innerHTML = 0;
        } else {
            counter--;
            count.innerHTML = counter;
            quantity.value = counter;
        }
    });

    plus.addEventListener("click", () => {
        counter++;
        count.innerHTML = counter;
        quantity.value = counter;
    });
</script>

<script>
    var swiper = new Swiper("#more-products .swiper", {
        slidesPerView: 4,
        spaceBetween: 10,
        // Optional parameters
        grabCursor: true,
        direction: "horizontal",
        loop: true,
        simulateTouch: true,

        // If we need pagination
        pagination: {
            el: ".swiper-pagination",
        },

        // Navigation arrows
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },

        breakpoints: {
            // when window width is >= 320px
            200: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            // when window width is >= 480px
            360: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            // when window width is >= 640px
            900: {
                slidesPerView: 4,
                spaceBetween: 40,
            },
        },
    });
</script>
@endsection