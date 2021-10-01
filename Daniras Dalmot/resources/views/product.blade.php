@extends('layouts.app')
@section('title','Products')

@section('css')
<!-- Swiper Js -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
    />
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
@endsection

@section('content')
   <!-- MAIN BANNER -->
  <div class="teambanner">
    <div class="contain">
      <div class="image">
        <img src="./assets/images/bg.jpg" alt="" />
      </div>
      <div class="image-overlay"></div>
      <div class="text">
        <div class="headings">
          <h1 class="">PRODUCTS</h1>
          <div class="bannerline"></div>
        </div>
        <div class="bannernav">
          <li><i class="fas fa-home"></i></li>
          <li><a href="./index.html">HOME</a></li>
          <li><i class="fas fa-caret-right"></i></li>
          <li><a href="./about.html">PRODCUTS</a></li>
        </div>
      </div>
    </div>
  </div>
  <!-- END MAIN BANNER -->

    <!-- PRODUCT DETAILS -->

    <section id="display-product">
      <div class="product-main">
        <div class="product-image" data-tilt>
          <img src="./assets/images/0.jpg" alt="" />
        </div>
        <div class="product-details">
          <div class="product-name">
            <p>Mixture Dalmot (In Stock)</p>
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
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque,
              tenetur? Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Magni, adipisci!
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
        <div class="modal" id="myModal">
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
                <form action= {{route('productorder')}} method="POST">
                    @csrf
                    <input type="hidden" name="quantity" id="quantity">
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
                      name="Address"
                    />
                    @error('Address')
                        {{$message}}
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="Phone">Phone Number:</label>
                    <input
                      type="text"
                      class="form-control"
                      id="Phone"
                      name="Phone"
                    />
                    @error('Phone')
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

    <!-- More Products -->

    <section id="more-products">
      <div class="main">
        <div class="title">
          <p>More Products</p>
          <div class="line"></div>
        </div>
        <!-- Slider main container -->
        <div class="swiper images">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
              <div class="image">
                <img src="./assets/images/0.jpg" alt="" class="slider-image"/>
                <div class="overlay-image">
                  <button class="view">View</button>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="image">
                <img src="./assets/images/1.jpg" alt="" class="slider-image"/>
                <div class="overlay-image">
                  <button class="view">View</button>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="image">
                <img src="./assets/images/2.jpg" alt="" class="slider-image"/>
                <div class="overlay-image">
                  <button class="view">View</button>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="image">
                <img src="./assets/images/3.jpg" alt="" class="slider-image"/>
                <div class="overlay-image">
                  <button class="view">View</button>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="image">
                <img src="./assets/images/4.jpg" alt="" class="slider-image"/>
                <div class="overlay-image">
                  <button class="view">View</button>
                </div>
              </div>
            </div>
          </div>
          <!-- If we need pagination -->
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section>
@endsection
