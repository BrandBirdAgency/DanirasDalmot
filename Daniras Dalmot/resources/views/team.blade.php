@extends('layouts.app')

@section('title','Team')
@section('css')
<!-- Link Swiper's CSS -->
    <link
    rel="stylesheet"
    href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href={{asset("assets/css/style.css")}} />
@endsection

@section('content')
    <!-- TEAM BEGIN -->

    <!-- MAIN BANNER -->
    <div class="teambanner">
        <div class="contain">
            {{-- <div class="container">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {!! Session::get('success') !!}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div> --}}
            <div class="container">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {!! Session::get('success') !!}
                    </div>
                @endif
            </div>
          <div class="image">
            <img src={{asset("assets/images/bg.jpg")}} alt="" />
          </div>
          <div class="image-overlay"></div>
          <div class="text">
            <div class="headings">
              <h1 class="">OUR TEAM</h1>
              <div class="bannerline"></div>
            </div>
            <div class="bannernav">
              <li><i class="fas fa-home"></i></li>
              <li><a href={{route('homepage')}}>HOME</a></li>
              <li><i class="fas fa-caret-right"></i></li>
              <li><a href={{route('teampage')}}>TEAM</a></li>
            </div>
          </div>
        </div>
      </div>
      <!-- END MAIN BANNER -->

      <div id="team" class="maindiv">
        @if (Auth::guard('web')->check())

            <!-- The Modal -->
            <div class="modal fade" id="ceo">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Messages</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        &times;
                    </button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    <form action={{ route('msg') }} method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="ceoname">Ceo Name:</label>
                                    <input type="text" class="form-control" value="{{$about->ceo_name}}" id="ceoname" name="ceoname" />
                                    @error('ceoname') {{$message}} @enderror
                                </div>
                                <div class="form-group">
                                    <label for="ceomsg">Ceo Message:</label>
                                    <textarea cols="30" rows="5" class="form-control" id="ceomsg" name="ceomsg">{{$about->ceo_msg}}</textarea>
                                    @error('ceomsg') {{$message}} @enderror
                                </div>
                                <div class="form-group">
                                    <label for="ceoimg">Ceo Photo:</label>
                                   <input type="file"  id="real-file1" hidden="hidden" />
                    <button type="button" id="custom-button1" class="btn">
                      Choose an image
                    </button>
                    <p id="custom-text1">No file chosen, yet.</p>
                                    @error('ceoimg') {{$message}} @enderror
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="chairmanname">Chairman Name:</label>
                                    <input type="text" class="form-control" value="{{$about->chairman_name}}" id="chairmanname" name="chairmanname" />
                                    @error('chairmanname') {{$message}} @enderror
                                </div>
                                <div class="form-group">
                                    <label for="chairmanmsg">Chairman Message:</label>
                                    <textarea cols="30" rows="5" class="form-control" id="chairmanmsg" name="chairmanmsg">{{$about->chairman_msg}}</textarea>
                                    @error('chairmanmsg') {{$message}} @enderror
                                </div>
                                <div class="form-group">
                                    <label for="chairmanimg">Chairman Photo:</label>
                                 <input type="file"  id="real-file2" hidden="hidden" />
                    <button type="button" id="custom-button2" class="btn">
                      Choose an image
                    </button>
                    <p id="custom-text2">No file chosen, yet.</p>
                                    @error('chairmanimg') {{$message}} @enderror
                                </div>
                            </div>
                        </div>
        <div class="btn-wrapper">
                        <button type="submit" class="submit-btn btn">Update</button>
</div>
                    </form>
                    </div>
                </div>
                </div>
            </div>
        @endif

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
                        src="{{$about->ceo_photo}}"
                        class="img-fluid"
                        alt="ceo"
                      />
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="message-contain">
                      <div class="cos">
                      <div class="cus-heading">
                        <h3>Message From CEO</h3>
                        <div class="line"></div>
                      </div>
                      <div class="edit-icon">
                        @if (Auth::guard('web')->check())
                            <h3><a data-toggle="modal" data-target="#ceo"><i class="fas fa-pencil-alt"></i></a></h3>
                        @endif
                      </div>
                    </div>
                      <p> {!!nl2br(e($about->ceo_msg))!!} </p>
                      <div class="name">
                        <span>Mr. {{$about->ceo_name}}</span><br />
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
                        src="{{$about->chairman_photo}}"
                        class="img-fluid"
                        alt="chairman"
                      />
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="message-contain">
                         <div class="cos">
                      <div class="cus-heading">
                        <h3>Message From Chairman</h3>
                        <div class="line"></div>
                      </div>
                         <div class="edit-icon">
                            @if (Auth::guard('web')->check())
                                <h3><a data-toggle="modal" data-target="#ceo"><i class="fas fa-pencil-alt"></i></a></h3>
                            @endif
                      </div>
                      </div>
                      <p> {!!nl2br(e($about->chairman_msg))!!} </p>
                      <div class="name">
                        <span>Mr. {{$about->chairman_name}}</span><br />
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
   <script>
      const realFileBtn = document.getElementById("real-file1");
      const customBtn = document.getElementById("custom-button1");
      const customTxt = document.getElementById("custom-text1");

      customBtn.addEventListener("click", function () {
        console.log("shu");
        realFileBtn.click();
      });

      realFileBtn.addEventListener("change", function () {
        if (realFileBtn.value) {

          customTxt.innerHTML = realFileBtn.value.match(
            /[\/\\]([\w\d\s\.\-\(\)]+)$/
          )[1];
        } else {
          customTxt.innerHTML = "No file choosen, yet.";
        }
      });
       const realFileBtn2 = document.getElementById("real-file2");
      const customBtn2 = document.getElementById("custom-button2");
      const customTxt2 = document.getElementById("custom-text2");

      customBtn2.addEventListener("click", function () {

        realFileBtn2.click();
      });

      realFileBtn2.addEventListener("change", function () {
        console.log("shu1");
        if (realFileBtn2.value) {
          customTxt2.innerHTML = realFileBtn2.value.match(
            /[\/\\]([\w\d\s\.\-\(\)]+)$/
          )[1];
        } else {
          customTxt2.innerHTML = "No file choosen, yet.";
        }
      });
    </script>
@endsection
