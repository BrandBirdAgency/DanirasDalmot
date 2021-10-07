@extends('layouts.app')

@section('title','Home')
@section('content')
<!-- Main Parallex -->

<section id="main-parallex">
    <div class="box">
      <div class="skew-box">
        <h3>Best in Town</h3>
      </div>
    </div>
    <img src="./assets/images/banner1.jpg" alt="" class="banner-img">
    <img src="./assets/images/3.png" alt="" class="product-1">
    <img src="./assets/images/2.png" alt="" class="product-2">
  </section>

  <div class="maindiv">

  <!-- INTRO -->
  <section class="intro home normalsec">
    <div class="row mx-0 px-0">
      <div class="col-md-6 col-12 text-center d-block d-md-none d-lg-block">
        <img src="./assets/images/3.png" alt="" class=" introimg">
      </div>
      <div class="col-md-12 col-lg-6 col-12 contents">
        <div class="heading">
          <h1>Welcome To Danira's</h1>
          <div class="line"></div>
          </div>
          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus assumenda fuga fugit totam itaque quo eius architecto earum quisquam nesciunt. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perferendis maiores quos voluptatum exercitationem commodi minima magnam vitae iure itaque impedit.</p>

            <div class="fea">
                <div class="con">
                    <div class="img">
                        <img src="./assets/images/like.png" alt="" class="img-1">
                    </div>
                    <div class="de">
                        <h3>Tasty Food</h3><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt natus maiores voluptatum! </p>
                    </div>
                </div>
                <div class="con">
                    <div class="img">
                        <img src="./assets/images/oil.png" alt="" class="img-2">
                    </div>
                    <div class="de">
                        <h3>Best Quality Oil</h3><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt natus maiores voluptatum! </p>
                    </div>
                </div>
                <div class="con">
                    <div class="img">
                        <img src="./assets/images/delivery.png" alt="" class="img-3">
                    </div>
                    <div class="de">
                        <h3>On Time Deliveries</h3><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt natus maiores voluptatum! </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
  <!-- END INTRO -->



  <!-- Products -->

  <section id="main-products" class="normalsec">
    <div class="container">
       <div class="heading text-center">
          <h3>Popular Products</h3>
          <div class="line"></div>
          </div>
      <div class="row justify-content-center justify-content-md-start">
        <div class="col-12 col-sm-8 col-md-6 col-lg-4">
          <div class="product-card " data-tilt data-tilt-max="7">
            <div class="badge">Hot</div>
            <div class="product-tumb ">
              <img src="./assets/images/0.png" alt="" >
            </div>
            <div class="product-details">
              <span class="product-catagory">Dalmoth</span>
              <h4><a href="">Special Dalmoth</a></h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
              <div class="product-bottom-details">
                <div class="product-price"><small>Rs.420</small>Rs.300</div>
                <div class="product-links">
                  <a href=""><i class="fa fa-shopping-cart"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-8 col-md-6 col-lg-4">
          <div class="product-card" data-tilt data-tilt-max="7">
            <div class="badge">Hot</div>
            <div class="product-tumb">
              <img src="./assets/images/2.png" alt="">
            </div>
            <div class="product-details">
              <span class="product-catagory">Dalmoth</span>
              <h4><a href="">Special Dalmoth</a></h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
              <div class="product-bottom-details">
                <div class="product-price"><small>Rs.420</small>Rs.300</div>
                <div class="product-links">
                  <a href=""><i class="fa fa-shopping-cart"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-8 col-md-6 col-lg-4">
          <div class="product-card" data-tilt data-tilt-max="7">
            <div class="badge">Hot</div>
            <div class="product-tumb">
              <img src="./assets/images/3.png" alt="">
            </div>
            <div class="product-details">
              <span class="product-catagory">Dalmoth</span>
              <h4><a href="">Special Dalmoth</a></h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
              <div class="product-bottom-details">
                <div class="product-price"><small>Rs.420</small>Rs.300</div>
                <div class="product-links">
                  <a href=""><i class="fa fa-shopping-cart"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- MESSAGE FROM CHAIRMAN -->
    <section class="home message normalsec">
            <div class="row px-0 mx-0">
              <div class="col-md-6 col-12">
                <div class="image-contain">
                  <div class="backbox"></div>
                  <img
                    src="./assets/images/Chairman.jpg"
                    class="img-fluid"
                    alt=""
                  />
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="message-contain">
                  <div class="cus-heading">
                    <h3>Message From Chairman</h3>
                    <div class="line"></div>
                  </div>
                  <p>
                    With the pride and experience of leading the domestic food
                    industry, we are everyday discovering and exploring so as
                    to progress with our customers and partners.<br /><br />
                    Our main goal is to make our customers happy for which we
                    are committed to give them the best product and services.
                    Thank you all for your patience and help while our
                    organization is constructing and internal management is in
                    process. We appreciate your efforts and loyalty.
                  </p>
                  <div class="name">
                    <span>Mr. Nirmal Pd Gupta</span><br />
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
                            <h3>Home Delivery</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit Cras.</p>
                        </div>
                    </div><!-- END COL-->
                    <div class="col-lg-4 col-md-6 col-sm-8 col-xs-12 mb-5">
                    <div class="single_feature h-100">
                        <div class="feature_icon"><i class="fa fa-magic"></i></div>
                        <h3>Quality Food</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit Cras.</p>
                            </div>
                    </div><!-- END COL-->
                    <div class="col-lg-4 col-md-6 col-sm-8 col-xs-12 mb-5">
                        <div class="single_feature h-100">
                        <div class="feature_icon"><i class="fas fa-sms"></i></div>
                      <h3>Send Messages</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit Cras.</p>
                    </div>
                  </div><!-- END COL-->
                  <div class="col-lg-4 col-md-6 col-sm-8 col-xs-12 mb-5">
                    <div class="single_feature h-100">
                      <div class="feature_icon"><i class="far fa-money-bill-alt"></i></div>
                      <h3>Reasonable Price</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit Cras.</p>
                    </div>
                  </div><!-- END COL-->
                  <div class="col-lg-4 col-md-6 col-sm-8 col-xs-12 mb-5">
                    <div class="single_feature h-100">
                      <div class="feature_icon"><i class="fas fa-mail-bulk"></i></div>
                      <h3>Bulk Order</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit Cras.</p>
                    </div>
                  </div><!-- END COL-->
                  <div class="col-lg-4 col-md-6 col-sm-10 col-xs-12 mb-5">
                    <div class="single_feature h-100">
                      <div class="feature_icon"><i class="fas fa-users"></i></div>
                      <h3>Responsive Team</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit Cras.</p>
                    </div>
                  </div><!-- END COL-->
                </div><!--- END ROW -->
            </div><!--- END ROW -->
        </div><!--- END CONTAINER -->
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
            <h3 class="title">Three Simple Step To Started Working Process</h2>
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
              <p class="mb-0">Nostrud exercitat ullamco lorem ipsum dolor sit amet, consece adipising elit, sed doeo eiusmod</p>
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
              <p class="mb-0">Nostrud exercitat ullamco lorem ipsum dolor sit amet, consece adipising elit, sed doeo eiusmod</p>
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
              <p class="mb-0">Nostrud exercitat ullamco lorem ipsum dolor sit amet, consece adipising elit, sed doeo eiusmod</p>
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
