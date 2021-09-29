<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home | Danira's</title>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" type="text/css" href="vendor/css/bootstrap.css" />
    <link
      rel="stylesheet"
      type="text/css"
      href="vendor/css/bootstrap.min.css"
    />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600;700&display=swap"
      rel="stylesheet"
    />

    <!-- FONTAWESOME -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
      integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"
    />
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body id="hello">
    <!-- HEADER -->
    <header>
      <a class="logo" href="/"
        ><img src="./assets/images/logo.jpg" alt="logo"
      /></a>
      <nav>
        <ul class="nav__links">
          <li><a href="{{route('homepage')}}">Home</a></li>
          <li><a href="{{route('productpage')}}">Products</a></li>
          <li><a href="{{route('teampage')}}">Team</a></li>
          <li><a href="{{route('aboutpage')}}">About</a></li>
        </ul>
      </nav>
      <a class="cta" href="{{route('contactpage')}}">Contact</a>
      <p class="menu cta">Menu</p>
    </header>
    <div id="mobile__menu" class="overlay">
      <a class="close">&times;</a>
      <div class="overlay__content">
        <a href="{{route('homepage')}}">Home</a>
        <a href="{{route('productpage')}}">Products</a>
        <a href="{{route('teampage')}}">Team</a>
        <a href="{{route('aboutpage')}}">About</a>
        <a href="{{route('contactpage')}}">Contact</a>
      </div>
    </div>
    <!-- END HEADER -->

    <section id="home">

    <!-- Main Parallex -->

    <section id="main-parallex">
      <img src="./assets/images/banner.png" alt="">
    </section>

    <!-- MAIN-BANNER -->
    <section class="main-banner">
      <div
        id="carouselExampleIndicators"
        class="carousel slide carousel-fade"
        data-ride="carousel"
      >
        <div class="carousel-indicators">
          <li
            data-target="#carouselExampleIndicators"
            data-slide-to="0"
            class="active"
          ></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img
              src="./assets/images/home1.jpg"
              class="d-block w-100"
              alt="..."
            />

            <div class="banner-content">
              <h1 class="heading">Love At First Bite</h1>

              <a class="buttons" href="{{route('productpage')}}">Order Now!</a>
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="./assets/images/home2.jpg"
              class="d-block w-100"
              alt="..."
            />

            <div class="banner-content">
              <h1 class="heading">Free Delivery All Over Valley</h1>

              <a class="buttons" href="{{route('productpage')}}">Order Now!</a>
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="./assets/images/home3.jpg"
              class="d-block w-100"
              alt="..."
            />

            <div class="banner-content">
              <h1 class="heading">
                Jhurum Jhurum Furandana Kham Dashain Manam
              </h1>

              <a class="buttons" href="{{route('productpage')}}">Order Now!</a>
            </div>
          </div>
        </div>
        <a
          class="carousel-control-prev"
          href="#carouselExampleIndicators"
          role="button"
          data-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a
          class="carousel-control-next"
          href="#carouselExampleIndicators"
          role="button"
          data-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </section>

    <!-- Products -->

    <section id="main-products">
      <div class="container">
        <div class="row justify-content-center justify-content-md-start">
          <div class="col-12 col-sm-8 col-md-6 col-lg-4">
            <div class="product-card " data-tilt>
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
            <div class="product-card" data-tilt>
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
            <div class="product-card" data-tilt>
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

    <!-- Parallex Section -->

    <div class="header" id="header" data-type="background">
      <img src="/assets/images/aboutparallax.jpg" alt="landscape" class="header__img">
      <div class="header__text-box">
        <h1 class="header__title">
          <span class="header__title--main">New Adventure</span>
          <span class="header__title--sub">Explore a new way to look our world.</span>
        </h1>
        <a href="#" class="header__btn">Discover now</a>
      </div>
    </div>

    <!-- Manufacturing Process -->

    <section class="text-center pos-r manufacturing-process">
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
                <div class="step-icon"><span><i class="fa fa-rocket"></i></span>
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
                <div class="step-icon"><span><i class="fa fa-rocket"></i></span>
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

    <!-- FOOTER -->

    <div class="footer-basic">
      <footer>
        <div class="social">
          <a href="#"><i class="icon ion-social-instagram"></i></a
          ><a href="#"><i class="icon ion-social-snapchat"></i></a
          ><a href="#"><i class="icon ion-social-twitter"></i></a
          ><a href="#"><i class="icon ion-social-facebook"></i></a>
        </div>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Home</a></li>
          <li class="list-inline-item"><a href="#">Products</a></li>
          <li class="list-inline-item"><a href="#">Team</a></li>
          <li class="list-inline-item"><a href="#">About</a></li>
          <li class="list-inline-item"><a href="#">Contact</a></li>
        </ul>
        <p class="copyright">Company Name © 2018</p>
      </footer>
    </div>

    <!-- END FOOTER -->

    <!-- Script Source Files -->
    <script>
      const banner = document.querySelectorAll("#home .carousel-inner img");
      const header = document.querySelector("header");
      banner.forEach((item) => {
        item.addEventListener("load", () => {
          item.style.height =
            window.innerHeight - (header.offsetHeight - 8) + "px";
        });
      });
    </script>
    <script src="vendor/js/jquery-3.6.0.min.js"></script>
    <script src="./assets/js/main.js"></script>
    <script src="./vendor/js/aos.js"></script>
    <script src="vendor/js/jquery.waypoints.js"></script>
    <script src="vendor/js/jquery.counterup.js"></script>
    <script src="vendor/js/bootstrap.min.js"></script>
    <script src="vendor/js/bootstrap.bundle.js"></script>
    <script src="vendor/js/popper.min.js"></script>
    <script src="assets/js/tilt.jquery.js"></script>
  </body>
</html>
