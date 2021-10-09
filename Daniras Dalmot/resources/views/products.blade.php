@extends('layouts.app')
@section('title','Products')

@section('css')
<!-- Swiper Js -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
    />
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href={{asset('assets/css/style.css')}} />
@endsection

@section('content')
<!-- MAIN BANNER -->
<div class="teambanner">
    <div class="contain">
      <div class="image">
        <img src={{asset("assets/images/bg.jpg")}} alt="" />
      </div>
      <div class="image-overlay"></div>
      <div class="text">
        <div class="headings">
          <h1 class="">PRODUCTS</h1>
          <div class="bannerline"></div>
        </div>
        <div class="bannernav">
          <li><i class="fas fa-home"></i></li>
          <li><a href={{route('homepage')}}>HOME</a></li>
          <li><i class="fas fa-caret-right"></i></li>
          <li><a href={{route('productpage')}}>PRODCUTS</a></li>
        </div>
      </div>
    </div>
  </div>
  <!-- END MAIN BANNER -->

  <!-- PRODUCT DETAILS -->
  <div class="maindiv">
    <section id="display-product">
        @foreach($products as $p)
        @if($p->id==$id)
      <div class="product-main">
        <div class="product-image" data-tilt>
          <img src={{Storage::url($p->photo)}} alt="" />
        </div>
        <div class="product-details">
          <div class="product-name">
            <p>{{$p->name}}</p>
            <div class="status"></div>
          </div>
          <div class="product-rating">
            <span><i class="fas fa-star"></i></span>
            <span><i class="fas fa-star"></i></span>
            <span><i class="fas fa-star"></i></span>
            <span><i class="fas fa-star"></i></span>
            <p>(5 reviews)</p>
          </div>
          <div class="product-info">
            <p>
              {{$p->description}}
            </p>
          </div>
          <div class="product-count">
            <p>Quantity</p>
            <div class="counter">
              <span class="minus"><i class="fas fa-minus"></i></span>
              <p class="count">1</p>
              <span class="plus"><i class="fas fa-plus"></i></span>
            </div>
          </div>
          <button data-toggle="modal" data-target="#myModal">Buy</button>
          <div class="line"></div>
          <div class="share-product">
            <p>Share on</p>
            <div class="icons">
              <span><i class="fab fa-facebook-f"></i></span>
              <span><i class="fab fa-instagram"></i></span>
              <span><i class="fab fa-twitter"></i></span>
            </div>
          </div>
        </div>

        <!-- The Modal -->
        <div class="modal fade" id="myModal">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Delivery Information</h4>
                <button type="button" class="close" data-dismiss="modal">
                  &times;
                </button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <form action={{ route('productorder') }} method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value={{$p->id}}>
                    <input type="hidden" name="quantity" id="quantity">
                    <input type="hidden" name="price" value={{$p->price}}>
                  <div class="form-group">
                    <label for="usr">Full Name:</label>
                    <input
                      type="text"
                      class="form-control"
                      id="usr"
                      name="username"
                    />
                    @error('username')
                        {{$message}}
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="Address">Address:</label>
                    <input
                      type="text"
                      class="form-control"
                      id="Address"
                      name="address"
                    />
                        @error('address ')
                            {{$message}}
                        @enderror
                  </div>
                  <div class="form-group">
                    <label for="Phone">Phone Number:</label>
                    <input
                      type="text"
                      class="form-control"
                      id="Phone"
                      name="phone"
                    />
                    @error('phone')
                    {{$message}}
                    @enderror
                  </div>
                  <button type="submit" class="submit-btn">Proceed</button>
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
                <img
                  src={{Storage::url($p->photo)}}
                  alt=""
                  class="slider-image"
                />
                <div class="overlay-image">
                 <a href={{route('productpage',['id'=>$p->id])}}> <button class="view">View</button><a>
                </div>
              </div>
            </div>
            @empty
            {{ "Product not available" }}
        @endforelse
            </div>
              <!-- If we need pagination -->
          <div class="swiper-pagination"></div>
          </div>
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
            <img src={{asset("assets/images/infra1.jpg")}} alt="" class="img-fluid" />
          </div>
          <div class="col-md-6 col-12">
            <div class="content">
              <div class="heading">
                <h3>Fully Automated Plant</h3>
                <div class="line"></div>
              </div>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Facilis fuga fugit repudiandae! Vitae dolores debitis eos
                fugiat repellat, atque eius odio earum nemo magnam libero,
                illo ad consequuntur deserunt maiores ipsa commodi ab eaque.
                <br /><br />
                Debitis commodi eos, ut ad sapiente dolor consectetur alias
                saepe, doloribus labore ex numquam velit, harum qui corrupti
                animi magnam veritatis eum nesciunt hic a perspiciatis. Lorem
                ipsum dolor sit, amet consectetur adipisicing elit. Molestias,
                nesciunt!
              </p>
            </div>
          </div>
          <div class="col-md-6 col-12 d-md-none">
            <img src={{asset("assets/images/infra1.jpg")}} alt="" class="img-fluid" />
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
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Facilis fuga fugit repudiandae! Vitae dolores debitis eos
                fugiat repellat, atque eius odio earum nemo magnam libero,
                illo ad consequuntur deserunt maiores ipsa commodi ab eaque.
                <br /><br />
                Debitis commodi eos, ut ad sapiente dolor consectetur alias
                saepe, doloribus labore ex numquam velit, harum qui corrupti
                animi magnam veritatis eum nesciunt hic a perspiciatis. Lorem
                ipsum dolor sit, amet consectetur adipisicing elit. Molestias,
                nesciunt!
              </p>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <img src={{asset("assets/images/infra2.jpg")}} alt="" class="img-fluid" />
          </div>
        </div>
        <div class="row det">
          <div class="col-md-6 col-12 d-md-block d-none">
            <img src={{asset("assets/images/infra3.jpg")}} alt="" class="img-fluid" />
          </div>
          <div class="col-md-6 col-12">
            <div class="content">
              <div class="heading">
                <h3>Print & Packaging Plant</h3>
                <div class="line"></div>
              </div>

              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Facilis fuga fugit repudiandae! Vitae dolores debitis eos
                fugiat repellat, atque eius odio earum nemo magnam libero,
                illo ad consequuntur deserunt maiores ipsa commodi ab eaque.
                <br /><br />
                Debitis commodi eos, ut ad sapiente dolor consectetur alias
                saepe, doloribus labore ex numquam velit, harum qui corrupti
                animi magnam veritatis eum nesciunt hic a perspiciatis. Lorem
                ipsum dolor sit, amet consectetur adipisicing elit. Molestias,
                nesciunt!
              </p>
            </div>
          </div>
          <div class="col-md-6 col-12 d-md-none">
            <img src={{asset("assets/images/infra3.jpg")}} alt="" class="img-fluid" />
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
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Facilis fuga fugit repudiandae! Vitae dolores debitis eos
                fugiat repellat, atque eius odio earum nemo magnam libero,
                illo ad consequuntur deserunt maiores ipsa commodi ab eaque.
                <br /><br />
                Debitis commodi eos, ut ad sapiente dolor consectetur alias
                saepe, doloribus labore ex numquam velit, harum qui corrupti
                animi magnam veritatis eum nesciunt hic a perspiciatis. Lorem
                ipsum dolor sit, amet consectetur adipisicing elit. Molestias,
                nesciunt!
              </p>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <img src={{asset("assets/images/infra4.jpg")}} alt="" class="img-fluid" />
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

@section('js')
<script src={{asset("vendor/js/aos.js")}}></script>
<script src={{asset("vendor/js/jquery.waypoints.js")}}></script>
<script src={{asset("vendor/js/jquery.counterup.js")}}></script>
<script src={{asset("vendor/js/bootstrap.bundle.js")}}></script>
<script>
    let count = document.querySelector(".count");
    let minus = document.querySelector(".minus");
    let plus = document.querySelector(".plus");
    let quantity = document.querySelector("#quantity");
    let counter = 1;
    quantity.value = 1;

    minus.addEventListener("click", () => {
      if (counter <= 0){ count.innerHTML = 0;}
      else {
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
