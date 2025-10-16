@extends('layouts.app')

@section('title','Team')
@section('css')
<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<link rel="stylesheet" href={{asset("assets/css/style.css")}} />
<link rel="canonical" href="{{url('')}}/team">
@endsection

@section('content')
<!-- TEAM BEGIN -->

<!-- MAIN BANNER -->
<div class="teambanner">
  <div class="contain">
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
        <h1 class="">OUR CORE TEAM MEMBERS</h1>
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

<div id="team" class="maindiv">
  @if (Auth::guard('web')->check())

  <!-- The Modal -->
  <div class="modal fade" id="ceo">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
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
                  <textarea cols="30" rows="5" class="form-control" id="ceomsg"
                    name="ceomsg">{{$about->ceo_msg}}</textarea>
                  @error('ceomsg') {{$message}} @enderror
                </div>
                <div class="form-group">
                  <label for="ceoimg">Ceo Photo:</label>
                  <input type="file" id="real-file1" hidden="hidden" name="ceoimg" />
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
                  <input type="text" class="form-control" value="{{$about->chairman_name}}" id="chairmanname"
                    name="chairmanname" />
                  @error('chairmanname') {{$message}} @enderror
                </div>
                <div class="form-group">
                  <label for="chairmanmsg">Chairman Message:</label>
                  <textarea cols="30" rows="5" class="form-control" id="chairmanmsg"
                    name="chairmanmsg">{{$about->chairman_msg}}</textarea>
                  @error('chairmanmsg') {{$message}} @enderror
                </div>
                <div class="form-group">
                  <label for="chairmanimg">Chairman Photo:</label>
                  <input type="file" id="real-file2" hidden="hidden" class="chairmanimg" />
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
                <img src="{{$about->ceo_photo}}" class="img-fluid" alt="ceo" />
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="message-contain">
                <div class="cos">
                  <div class="cus-heading">
                    <h2 class="h3">Message From CEO</h2>
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
                <img src="{{$about->chairman_photo}}" class="img-fluid" alt="chairman" />
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="message-contain">
                <div class="cos">
                  <div class="cus-heading">
                    <h2 class="h3">Message From Chairman</h2>
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
    <div class="swiper-pagination"></div>
  </div>

  <!-- END MESSAGE FROM CHAIRMAN -->

  <!-- TEAMS -->
  <section class="teams normalsec">
    <div class="heading text-center">
      <h2 class="h3">Our Team Members</h2>
      <div class="line"></div>
    </div>
    <p class="short-desc">
      <q><i>To us, teamwork is the beauty of our sport, where you have five acting as one. You become selfless.</i></q>
    </p>
    <div class="contain">
      <div class="row mx-0 px-0">
        @forelse ($teams as $team)
        @if(!$team->team_id)
        <div class="col-lg-4 col-md-6 col-12 member">
          <div class="info">
            <div class="image">
              <img src="{{$team->photo}}" alt="team" class="img-fluid" />
            </div>
            <div class="detail">
              <p class="name">{{$team->name}}</p>
              <p class="post">{{$team->position}}</p>
              <div class="socials">
                <a href="{{$team->facebook}}"><i class="fab fa-facebook-f"></i></a>
                <a href="{{$team->instagram}}"><i class="fab fa-instagram"></i></a>
              </div>
            </div>
          </div>
          <hr />
        </div>
        @endif
        @empty
        <div class="no-content">
          <h4>No Team</h4>
        </div>
        @endforelse
      </div>
    </div>
  </section>

  <section class="normalsec company-main">
    <div class="heading text-center">
      <h2 class="h3">Our Partner</h2>
      <div class="line"></div>
    </div>
    <div class="row justify-content-center">
      <div class="col-12 col-md-6 mb-4 mb-md-0">
        <h5><span class="color-gold">Brand</span><span class="color-blue"> Bird</span></h5>
        <p>Brand Bird is a full-service creative and technology team. We provide a
          complete
          Web and App solution by providing you the essential services including graphic design, UX/UI design, Web
          Development,
          Content Management, Social Media Integration, SEO. We are a team of experienced website designers, developers,
          and
          digital strategists.
        </p>
        <p>-We <span class="color-blue">Hear</span> We <span class="color-blue">Make</span> IT Happen.</p>
      </div>
      <div class="col-12 col-md-6">
        <img class="company-logo" src="{{asset('assets/images/logo.jpg')}}" alt="Company Logo">
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-12">
        <h5 class="team-heading">Team Members</h5>
      </div>
      @forelse ($teams as $team)
      @if($team->team_id)
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="team-card">
          <img src="{{$team->photo}}" alt="{{$team->name}}">
          <div class="team-info d-flex flex-column justify-content-center">
            <h5><a href="https://brandbirdagency.com" target="_blank"
                class="text-decoration-none color-blue">{{$team->name}}</a>
            </h5>
            <p>{{$team->position}}</p>
          </div>
        </div>
      </div>
      @endif
      @empty
      <div class="no-content">
        <h4>No Team</h4>
      </div>
      @endforelse

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