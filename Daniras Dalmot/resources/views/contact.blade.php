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
    <link rel="stylesheet" href="./assets/css/contact.css" />
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

  <!-- MAIN BANNER -->
  <div class="teambanner">
    <div class="contain">
      <div class="image">
        <img src="./assets/images/bg.jpg" alt="" />
      </div>
      <div class="image-overlay"></div>
      <div class="text">
        <div class="headings">
          <h1 class="">CONTACT</h1>
          <div class="bannerline"></div>
        </div>
        <div class="bannernav">
          <li><i class="fas fa-home"></i></li>
          <li><a href="{{route('homepage')}}">HOME</a></li>
          <li><i class="fas fa-caret-right"></i></li>
          <li><a href="{{route('aboutpage')}}">CONTACT</a></li>
        </div>
      </div>
    </div>
  </div>
  <!-- END MAIN BANNER -->

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-10">
            <div class="wrapper">
              <div class="row no-gutters">
                <div class="col-md-6">
                  <div class="contact-wrap w-100 p-lg-5 p-4">
                    <h3 class="mb-4">Send us a message</h3>
                    <div id="form-message-warning" class="mb-4"></div>
                    <div id="form-message-success" class="mb-4">
                      Your message was sent, thank you!
                    </div>
                    <form
                      method="POST"
                      id="contactForm"
                      name="contactForm"
                      class="contactForm"
                      action={{route('contactadmin')}}
                    >
                    @csrf
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <input
                              type="text"
                              class="form-control"
                              name="name"
                              id="name"
                              placeholder="Name"
                              value={{old('name')}}
                            />
                            @error('name')
                                {{$message}}
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <input
                              type="email"
                              class="form-control"
                              name="email"
                              id="email"
                              placeholder="Email"
                              value={{old('email')}}
                            />
                          </div>
                          @error('email')
                                {{$message}}
                            @enderror
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <input
                              type="text"
                              class="form-control"
                              name="subject"
                              id="subject"
                              placeholder="Subject"
                              value={{old('subject')}}
                            />
                          </div>
                          @error('subject')
                                {{$message}}
                            @enderror
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <textarea
                              name="message"
                              class="form-control"
                              id="message"
                              cols="30"
                              rows="6"
                              placeholder="Message"
                              value={{old('message')}}
                            ></textarea>
                          </div>
                          @error('message')
                            {{$message}}
                          @enderror
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <input
                              type="submit"
                              value="Send Message"
                              class="submit-btn"
                            />
                            <div class="submitting"></div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="col-md-6 d-flex align-items-stretch">
                  <div class="info-wrap w-100 p-lg-5 p-4 img">
                    <h3>Contact us</h3>
                    <p class="mb-4">
                      We're open for any suggestion or just to have a chat
                    </p>
                    <div class="dbox w-100 d-flex align-items-start">
                      <div
                        class="
                          icon
                          d-flex
                          align-items-center
                          justify-content-center
                        "
                      >
                        <span class="fa fa-map-marker"></span>
                      </div>
                      <div class="text pl-3">
                        <p><span>Address:</span> Parwanipur-5, Bara, Nepal</p>
                      </div>
                    </div>
                    <div class="dbox w-100 d-flex align-items-center">
                      <div
                        class="
                          icon
                          d-flex
                          align-items-center
                          justify-content-center
                        "
                      >
                        <span class="fa fa-phone"></span>
                      </div>
                      <div class="text pl-3">
                        <p>
                          <span>Phone:</span>
                          <a href="tel://9845999137">+977 9845999137</a>
                        </p>
                      </div>
                    </div>
                    <div class="dbox w-100 d-flex align-items-center">
                      <div
                        class="
                          icon
                          d-flex
                          align-items-center
                          justify-content-center
                        "
                      >
                        <span class="fa fa-paper-plane"></span>
                      </div>
                      <div class="text pl-3">
                        <p>
                          <span>Email:</span>
                          <a href="mailto:infodanirasdalmoth@gmail.com"
                            >infodanirasdalmoth@gmail.com</a
                          >
                        </p>
                      </div>
                    </div>
                    <div class="dbox w-100 d-flex align-items-center">
                      <div
                        class="
                          icon
                          d-flex
                          align-items-center
                          justify-content-center
                        "
                      >
                        <span class="fa fa-globe"></span>
                      </div>
                      <div class="text pl-3">
                        <p>
                          <span>Website</span>
                          <a href="www.danirasdalmoth.com"
                            >danirasdalmoth.com</a
                          >
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="google-maps">
      <iframe
        width="100%"
        height="500"
        style="border: 0"
        loading="lazy"
        allowfullscreen
        src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJz7lIcjdVkzkRhj2x77WzDQk&key=AIzaSyB9rtq1F5EacmlMgt_1QuNsl9d0FEZ06DY"
      ></iframe>
    </div>

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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="vendor/js/jquery-3.6.0.min.js"></script>
    <script src="./assets/js/main.js"></script>
    <script src="./vendor/js/aos.js"></script>
    <script src="vendor/js/jquery.waypoints.js"></script>
    <script src="vendor/js/jquery.counterup.js"></script>
    <script src="vendor/js/bootstrap.min.js"></script>
    <script src="vendor/js/bootstrap.bundle.js"></script>
    <script src="vendor/js/popper.min.js"></script>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/contact.js"></script>
  </body>
</html>
