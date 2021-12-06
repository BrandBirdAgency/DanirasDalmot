@extends('layouts.app')

@section('title','Home')
@section('css')
<link rel="stylesheet" href={{asset("assets/css/style.css")}} />
@endsection
@section('content')
<!-- Main Parallex -->

<section id="main-parallex">
  <div class="box">
    <div class="skew-box">
      <h3>Quality that You can Trust</h3>
    </div>
  </div>
  <img src={{asset("assets/images/banner1.jpg")}} alt="" class="banner-img">
  <img src={{asset("assets/images/3.png")}} alt="" class="product-1">
  <img src={{asset("/assets/images/2.png")}} alt="" class="product-2">
</section>

<div class="maindiv">

  <!-- INTRO -->
  <section class="intro home normalsec">
    <div class="row mx-0 px-0">
      <div class="col-md-6 col-12 text-center d-block d-md-none d-lg-block">
        <img src={{asset("/assets/images/3.png")}} alt="" class=" introimg">
      </div>
      <div class="col-md-12 col-lg-6 col-12 contents">
        <div class="heading">
          <h1>Welcome To Danira's</h1>
          <div class="line"></div>
        </div>
        <p class="text-justify">"Danira's" a brand of "Pushpanjali Spices and Food Products" is a premium manufacturer
          and supplier of
          inovative quality food
          products at competitive rates. We work together with our customer and collegues to achive the best possible
          outcome. We build open and honest relationship with both customer and employees through open communication
          integrity, honesty and accountability that are at the core of our buisness.</p>

        <div class="fea">
          <div class="con">
            <div class="img">
              <img src={{asset("/assets/images/like.png")}} alt="" class="img-1">
            </div>
            <div class="de">
              <h3>Best Quality Products</h3>
              <p>Having hi-tech machineries enable us to produce best quality products! </p>
            </div>
          </div>
          <div class="con">
            <div class="img">
              <img src={{asset("assets/images/oil.png")}} alt="" class="img-2">
            </div>
            <div class="de">
              <h3>Healthly Products</h3>
              <p>In this century health is more valuable than wealth and that is what we focus on! </p>
            </div>
          </div>
          <div class="con">
            <div class="img">
              <img src={{asset("assets/images/delivery.png")}} alt="" class="img-3">
            </div>
            <div class="de">
              <h3>On Time Deliveries</h3>
              <p>We priortize on time deliveries understaning the time requirements! </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- END INTRO -->

  <!-- Hot Products -->

  <section id="main-products" class="normalsec">
    <div class="container">
      <div class="heading text-center">
        <h3>Popular Products</h3>
        <div class="line"></div>
      </div>
      <div class="row justify-content-center justify-content-md-start">
        @forelse($hot as $product)
        <div class="col-12 col-sm-8 col-md-6 col-lg-4">
          <div class="product-card " data-tilt data-tilt-max="7">
            <div class="badge">Hot</div>
            <div class="product-tumb ">
              <img src="{{Storage::url($product->photo)}}" alt="">
            </div>
            <div class="product-details">
              <span class="product-catagory">{{$product->category}}</span>
              <h4><a href={{route('productpage' ,$product->id)}}>{{$product->name}}</a></h4>
              <p>{{Str::substr($product->description, 0, 100)}} .....</p>
              <div class="product-bottom-details">
                <div class="product-price"><small>Rs.{{$product->retail_price}}</small>Rs.{{$product->price}}</div>
                <div class="product-links">
                  <a href="{{route('productpage' ,$product->id)}}"><i class="fa fa-shopping-cart"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        @empty
        <div class="no-content">
          <h4>No Products</h4>
        </div>
        @endforelse
      </div>
    </div>
  </section>

  <!-- MESSAGE FROM CHAIRMAN -->
  <section class="home message normalsec">
    <div class="row px-0 mx-0">
      <div class="col-md-6 col-12">
        <div class="image-contain">
          <div class="backbox"></div>
          <img src="{{$about->chairman_photo}}" class="img-fluid" alt="" />
        </div>
      </div>
      <div class="col-md-6 col-12">
        <div class="message-contain">
          <div class="cus-heading">
            <h3>Message From Chairman</h3>
            <div class="line"></div>
          </div>
          <p>{!!nl2br(e($about->chairman_msg))!!}</p>
          <div class="name">
            <span>Mr. {{$about->chairman_name}}</span><br />
            Chairman, Pushpanjali Spices & Food Products
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- END MESSAGE FROM CHAIRMAN -->

  <section class="amazing_feature">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center heading-main">
          <h2 class="heading">Our Services</h2>
          <div class="separator"><i class="fa fa-home below-line-about-icon"></i></div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-8 col-xs-12 mb-5">
          <div class="single_feature h-100">
            <div class="feature_icon"><i class="fas fa-truck"></i></div>
            <h3>On-Demand Delivery</h3>
            <p>Time is what we humans need to save which is what we do.</p>
          </div>
        </div><!-- END COL-->
        <div class="col-lg-4 col-md-6 col-sm-8 col-xs-12 mb-5">
          <div class="single_feature h-100">
            <div class="feature_icon"><i class="fa fa-magic"></i></div>
            <h3>Quality Food</h3>
            <p>Having hi-tech machineries enable us to produce best quality products.</p>
          </div>
        </div><!-- END COL-->
        <div class="col-lg-4 col-md-6 col-sm-8 col-xs-12 mb-5">
          <div class="single_feature h-100">
            <div class="feature_icon"><i class="fas fa-sms"></i></div>
            <h3>Send Messages</h3>
            <p>We are available 24/7 for our customer support.</p>
          </div>
        </div><!-- END COL-->
        <div class="col-lg-4 col-md-6 col-sm-8 col-xs-12 mb-5">
          <div class="single_feature h-100">
            <div class="feature_icon"><i class="far fa-money-bill-alt"></i></div>
            <h3>Reasonable Price</h3>
            <p>Comparing the market we provide quality with price product.</p>
          </div>
        </div><!-- END COL-->
        <div class="col-lg-4 col-md-6 col-sm-8 col-xs-12 mb-5">
          <div class="single_feature h-100">
            <div class="feature_icon"><i class="fas fa-mail-bulk"></i></div>
            <h3>Bulk Order</h3>
            <p>Being a manufacturing company we prefer bulk orders.</p>
          </div>
        </div><!-- END COL-->
        <div class="col-lg-4 col-md-6 col-sm-10 col-xs-12 mb-5">
          <div class="single_feature h-100">
            <div class="feature_icon"><i class="fas fa-users"></i></div>
            <h3>Responsive Team</h3>
            <p>We have the professional team with active repsonse.</p>
          </div>
        </div><!-- END COL-->
      </div>
      <!--- END ROW -->
    </div>
    <!--- END ROW -->
</div>
<!--- END CONTAINER -->
</section>

<!-- Manufacturing Process -->

<section class="text-center pos-r manufacturing-process normalsec">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-10 ml-auto mr-auto">
        <div class="section-title">
          <div class="title-effect">
            <div class="bar bar-top"></div>
            <div class="bar bar-right"></div>
            <div class="bar bar-bottom"></div>
            <div class="bar bar-left"></div>
          </div>
          <h6>How It Works</h6>
          <h3 class="title">Three Simple Step To Get The Products Delivered</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-12">
        <div class="work-process">
          <div class="box-loader"> <span></span>
            <span></span>
            <span></span>
          </div>
          <div class="step-num-box">
            <div class="step-icon"><span><i class="fas fa-hamburger"></i></span>
            </div>
            <div class="step-num">01</div>
          </div>
          <div class="step-desc">
            <h4>Pick a Product</h4>
            <p class="mb-0">Explore <a href="/products">products</a> page and pick the right product for you.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-12 md-mt-5">
        <div class="work-process">
          <div class="box-loader"> <span></span>
            <span></span>
            <span></span>
          </div>
          <div class="step-num-box">
            <div class="step-icon"><span><i class="fas fa-file-alt"></i></span>
            </div>
            <div class="step-num">02</div>
          </div>
          <div class="step-desc">
            <h4>Fill up the form</h4>
            <p class="mb-0">We will provide you with a form, fill it with the correct details.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-12 md-mt-5">
        <div class="work-process">
          <div class="step-num-box">
            <div class="step-icon"><span><i class="fa fa-check-square"></i></span>
            </div>
            <div class="step-num">03</div>
          </div>
          <div class="step-desc">
            <h4>Get it delivered</h4>
            <p class="mb-0">After the form is submitted. Ola! You will get instant call from our customer support</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
@endsection

@section('js')
<script>
  // max-height of banner for every screen
  const banner = document.querySelector("#main-parallex");

  const image = document.querySelector(".banner-img");

  const header = document.querySelector("header");
  window.addEventListener("load", () => {
     banner.style.height =
        window.innerHeight - (header.offsetHeight -8) + "px";
            image.style.height =
        window.innerHeight - (header.offsetHeight -8) + "px";

  })


    // Parallex Effect

  window.addEventListener("scroll", () => {

    let parallex_scrolled = window.scrollY;

    // main banner parallex effect

    let banner_image = document.querySelector(".banner-img");
    let product_1 = document.querySelector(".product-1");
    let product_2 = document.querySelector(".product-2");
    let skewBox = document.querySelector(".skew-box");

    let banner_image_value = parallex_scrolled / 3;
    let product_1_value = parallex_scrolled / 20 + 20;
    let product_2_value = parallex_scrolled / 20 + 10;


    banner_image.style.transform = `translateY(${banner_image_value}px)`;
    skewBox.style.transform = `skewX(20deg) translateY(${banner_image_value}px)`;

    if (product_1_value < 45) {
      product_1.style.transform = `rotate(-${product_1_value}deg) translateX(-${
        parallex_scrolled / 2
      }px)`;
      product_2.style.transform = `rotate(${product_2_value}deg) translateX(${
        parallex_scrolled / 2
      }px)`;
    }
  });
</script>
@endsection