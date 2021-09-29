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

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600;700&display=swap"
      rel="stylesheet"
    />

    <!-- Swiper Js -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
    />
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap"
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
    <link rel="stylesheet" href="./assets/css/style.css" />
  </head>
  <body>
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
      <a class="cta" href="./contact.html">Contact</a>
      <p class="menu cta">Menu</p>
    </header>
    <div id="mobile__menu" class="overlay">
      <a class="close">&times;</a>
      <div class="overlay__content">
        <a href="{{route('homepage')}}">Home</a>
        <a href="{{route('productpage')}}">Products</a>
        <a href="{{route('teampage')}}">Team</a>
        <a href="{{route('aboutpage')}}">About</a>
        <a href="./contact.html">Contact</a>
      </div>
    </div>
    <!-- END HEADER -->

    <!-- MAIN BANNER -->

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
          <li><a href="{{route('homepage')}}">HOME</a></li>
          <li><i class="fas fa-caret-right"></i></li>
          <li><a href="{{route('aboutpage')}}">PRODCUTS</a></li>
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
                <form action="">
                  <div class="form-group">
                    <label for="usr">Full Name:</label>
                    <input
                      type="text"
                      class="form-control"
                      id="usr"
                      name="username"
                    />
                  </div>
                  <div class="form-group">
                    <label for="Address">Address:</label>
                    <input
                      type="text"
                      class="form-control"
                      id="Address"
                      name="Address"
                    />
                  </div>
                  <div class="form-group">
                    <label for="Phone">Phone Number:</label>
                    <input
                      type="text"
                      class="form-control"
                      id="Phone"
                      name="Phone"
                    />
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

    <!-- FOOTER END -->

    <!-- Script Source Files -->
    <script src="vendor/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="vendor/js/jquery-3.6.0.min.js"></script>
    <script src="./assets/js/main.js"></script>
    <script src="./vendor/js/aos.js"></script>
    <script src="vendor/js/jquery.waypoints.js"></script>
    <script src="vendor/js/jquery.counterup.js"></script>
    <script src="vendor/js/bootstrap.bundle.js"></script>
    <script src="vendor/js/popper.min.js"></script>
    <script src="assets/js/tilt.jquery.js"></script>
  </body>
</html>
