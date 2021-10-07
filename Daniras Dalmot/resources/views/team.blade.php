@extends('layouts.app')

@section('title','Team')
@section('css')
<!-- Link Swiper's CSS -->
    <link
    rel="stylesheet"
    href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
@endsection

@section('content')
    <!-- TEAM BEGIN -->

    <!-- MAIN BANNER -->
    <div class="teambanner">
        <div class="contain">
          <div class="image">
            <img src="./assets/images/bg.jpg" alt="" />
          </div>
          <div class="image-overlay"></div>
          <div class="text">
            <div class="headings">
              <h1 class="">OUR TEAM</h1>
              <div class="bannerline"></div>
            </div>
            <div class="bannernav">
              <li><i class="fas fa-home"></i></li>
              <li><a href="./index.html">HOME</a></li>
              <li><i class="fas fa-caret-right"></i></li>
              <li><a href="./team.html">TEAM</a></li>
            </div>
          </div>
        </div>
      </div>
      <!-- END MAIN BANNER -->

      <div id="team" class="maindiv">
        <!-- MESSAGE FROM CHAIRMAN -->
        <!-- Slider main container -->
        <div class="swiper mySwiper swiper1">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
              <section class="message normalsec">
                <div class="row px-0 mx-0">
                  <div class="col-md-6 col-12">
                    <div class="image-contain">
                      <div class="backbox"></div>
                      <img
                        src="./assets/images/CEO.jpg"
                        class="img-fluid"
                        alt=""
                      />
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="message-contain">
                      <div class="cus-heading">
                        <h3>Message From CEO</h3>
                        <div class="line"></div>
                      </div>
                      <p>
                        In this kingdom of a rapid changing world, survival in
                        bussiness must never be taken for granted. Our vision of
                        the future must be to let new opportunities.<br /><br />
                        Our business is guided by ethics and transparency, and we
                        aim to further win and maintain our customers by preparing
                        packaged product that validate price, quality and of
                        course the taste.<br /><br />
                        Danira's has been selected with thoughtful precision and
                        utmost care to provide the best meal options. Our product
                        comes from extensive research and stricktly choosen top
                        ingredients from around the world. And I would like to
                        thank our customers for supporting us helping us in our
                        growth. We appreciate your love, support and trust.
                      </p>
                      <div class="name">
                        <span>Mr. Rahul Kalwar</span><br />
                        CEO, Pushpanjali Spices & Food Products
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            </div>
            <div class="swiper-slide">
              <section class="message normalsec">
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
            </div>
          </div>
          <!-- If we need pagination -->
          <div class="swiper-pagination"></div>

          <!-- If we need navigation buttons -->
          <!-- <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div> -->
        </div>

        <!-- END MESSAGE FROM CHAIRMAN -->

        <button data-toggle="modal" data-target="#myModal">Add Team Record</button>
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Create Team Record</h4>
                  <button type="button" class="close" data-dismiss="modal">
                    &times;
                  </button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <form action={{route('addrecord')}} method="POST">
                      @csrf
                      <input type="hidden" name="id">
                    <div class="form-group">
                      <label for="usr">Full Name:</label>
                      <input
                        type="text"
                        class="form-control"
                        id="usr"
                        name="name"
                      />
                      @error('name')
                          {{$message}}
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="Address">Position:</label>
                      <input
                        type="text"
                        class="form-control"
                        id="Address"
                        name="position"
                      />
                          @error('position')
                              {{$message}}
                          @enderror
                    </div>
                    <div class="form-group">
                      <label for="Phone">Phone Number:</label>
                      <input
                        type="number"
                        class="form-control"
                        id="Phone"
                        name="phone"
                      />
                      @error('phone')
                      {{$message}}
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="Phone">Address:</label>
                        <input
                          type="text"
                          class="form-control"
                          id="Phone"
                          name="address"
                        />
                        @error('address')
                        {{$message}}
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="Phone">Facebook:</label>
                        <input
                          type="url"
                          class="form-control"
                          id="Phone"
                          name="facebook"
                        />
                      </div>
                      <div class="form-group">
                        <label for="Phone">Instagram:</label>
                        <input
                          type="url"
                          class="form-control"
                          id="Phone"
                          name="instagram"
                        />
                        <div class="form-group">
                            <label for="Phone">Photo:</label>
                            <input
                              type="file"
                              class="form-control"
                              id="Phone"
                              name="photo"
                              accept="image/*"
                            />
                            @error('photo')
                            {{$message}}
                            @enderror
                          </div>
                      </div>
                    <button type="submit" class="submit-btn">Add</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

        <!-- TEAMS -->
        <section class="teams normalsec">
          <div class="heading text-center">
            <h3>Our Team</h3>
            <div class="line"></div>
          </div>
          <p class="short-desc">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum quo,
            sequi sed asperiores recusandae veritatis
          </p>
          <div class="contain">
            <div class="row mx-0 px-0">
              <div class="col-lg-4 col-md-6 col-12 member">
                <div class="info">
                  <div class="image">
                    <img
                      src="./assets/images/team1.jpg"
                      alt=""
                      class="img-fluid"
                    />
                  </div>
                  <div class="detail">
                    <p class="name">Nirmal Pd Gupta</p>
                    <p class="post">Chairman/Founder</p>
                    <div class="socials">
                      <a href="#/"><i class="fab fa-instagram"></i></a>
                      <a href="#/"><i class="fab fa-facebook-f"></i></a>
                    </div>
                  </div>
                </div>
                <hr />
              </div>
              <div class="col-lg-4 col-md-6 col-12 member">
                <div class="info">
                  <div class="image">
                    <img
                      src="./assets/images/team2.jpg"
                      alt=""
                      class="img-fluid"
                    />
                  </div>
                  <div class="detail">
                    <p class="name">Rahul Kalwar</p>
                    <p class="post">Chief Executive Office (CEO)</p>
                    <div class="socials">
                      <a href="#/"><i class="fab fa-instagram"></i></a>
                      <a href="#/"><i class="fab fa-facebook-f"></i></a>
                    </div>
                  </div>
                </div>
                <hr />
              </div>
              <div class="col-lg-4 col-md-6 col-12 member">
                <div class="info">
                  <div class="image">
                    <img
                      src="./assets/images/team3.jpg"
                      alt=""
                      class="img-fluid"
                    />
                  </div>
                  <div class="detail">
                    <p class="name">Bhoomi Kalwar</p>
                    <p class="post">Chief Operating Officer (COO)</p>
                    <div class="socials">
                      <a href="#/"><i class="fab fa-instagram"></i></a>
                      <a href="#/"><i class="fab fa-facebook-f"></i></a>
                    </div>
                  </div>
                </div>
                <hr />
              </div>
              <div class="col-lg-4 col-md-6 col-12 member">
                <div class="info">
                  <div class="image">
                    <img
                      src="./assets/images/team4.jpg"
                      alt=""
                      class="img-fluid"
                    />
                  </div>
                  <div class="detail">
                    <p class="name">Neha Kalwar</p>
                    <p class="post">Chief Financial Officer (CFO)</p>
                    <div class="socials">
                      <a href="#/"><i class="fab fa-instagram"></i></a>
                      <a href="#/"><i class="fab fa-facebook-f"></i></a>
                    </div>
                  </div>
                </div>
                <hr />
              </div>
              <div class="col-lg-4 col-md-6 col-12 member">
                <div class="info">
                  <div class="image">
                    <img
                      src="./assets/images/team4.jpg"
                      alt=""
                      class="img-fluid"
                    />
                  </div>
                  <div class="detail">
                    <p class="name">Aditya Martin</p>
                    <p class="post">Chief Marketing Officer (CMO)</p>
                    <div class="socials">
                      <a href="#/"><i class="fab fa-instagram"></i></a>
                      <a href="#/"><i class="fab fa-facebook-f"></i></a>
                    </div>
                  </div>
                </div>
                <hr />
              </div>
              <div class="col-lg-4 col-md-6 col-12 member">
                <div class="info">
                  <div class="image">
                    <img
                      src="./assets/images/team4.jpg"
                      alt=""
                      class="img-fluid"
                    />
                  </div>
                  <div class="detail">
                    <p class="name">Bikash Gupta</p>
                    <p class="post">Chief Technology Officer (CTO)</p>
                    <div class="socials">
                      <a href="#/"><i class="fab fa-instagram"></i></a>
                      <a href="#/"><i class="fab fa-facebook-f"></i></a>
                    </div>
                  </div>
                </div>
                <hr />
              </div>
            </div>
          </div>
        </section>
        <!-- END TEAMS -->
      </div>
      <!-- END TEAM -->

@endsection

@section('js')
 <!-- Swiper JS -->
 <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 1,
      spaceBetween: 50,
      // Optional parameters
      grabCursor: true,
      direction: "horizontal",
      loop: true,
      simulateTouch: true,

      // If we need pagination
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },

      autoplay: {
        delay: 10000,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>
@endsection
