@extends('layouts.app')
@section('title', 'About')
@section('css')
<link rel="stylesheet" href={{asset("assets/css/style.css")}} />
@endsection
@section('content')
  <!-- ABOUT BEGIN -->

  <!-- MAIN BANNER -->
  <div class="teambanner">
    <div class="contain">
      <div class="image">
        <img src={{asset("assets/images/bg.jpg")}} alt="" />
      </div>
      <div class="image-overlay"></div>
      <div class="text">
        <div class="headings">
          <h1 class="">ABOUT US</h1>
          <div class="bannerline"></div>
        </div>
        <div class="bannernav">
          <li><i class="fas fa-home"></i></li>
          <li><a href={{route('homepage')}}>HOME</a></li>
          <li><i class="fas fa-caret-right"></i></li>
          <li><a href={{route('aboutpage')}}>ABOUT</a></li>
        </div>
      </div>
    </div>
  </div>
  <!-- END MAIN BANNER -->

  <!-- ABOUT PAGE -->
  <div class="maindiv about">
    <section class="intro  normalsec">
      <div class="headings">
        <h1>
          Welcome to <span>Danira's Namkeen</span>. We're glad and grateful
          your're here .
        </h1>
        <p>
          Pushpanjali Spices and food products is a premium manufacturer and
          supplier of innovative quality food products at competitive rates.
          We work together with our customers and colleagues to achieve the
          best possible outcomes. We build open and honest relationship with
          customers through open communication integrity, honesty abd
          accountability and are the core of our bussiness and growth.
        </p>
        <div class="lines">
         <div class="line l1"></div>
          <div class="line l2"></div>
           <div class="line l1"></div>
            </div>

      </div>
    </section>

    <section class="details normalsec">
      <div class="row px-0 mx-0">
        <div class="headinges col-12">
          <h2><span>GET</span> TO KNOW US</h2>
          <div class="line"></div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
          <div class="main">
            <div class="head">
              <lord-icon src="https://cdn.lordicon.com/oyclgnwc.json" trigger="loop"
                colors="primary:#e83225,secondary:#e83225" delay="100" stroke="82" scale="56" axis-x="52"
                style="width:60px; height: 60px" class=="icon">
              </lord-icon>
            </div>
            <div class="content">
              <p class="top">OUR ESSENCE</p>
              <p>
                Danira's mission is to build an honest realtionship with our
                customers and to make make the availability of authentic, tast and
                quality food products that are 100% vegeterian possible and to
                manfucature as per global standards with much love, passion and
                reliablilty.
              </p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6  col-12">
          <div class="main">
            <div class="head">
              <lord-icon src="https://cdn.lordicon.com/rqsvgwdj.json" trigger="loop" delay="100"
                colors="primary:#e83225,secondary:#e83225" stroke="82" scale="56" axis-x="52"
                style="width: 60px; height: 60px" class="icon">
              </lord-icon>
            </div>
            <div class="content">
              <p class="top">OUR MISSION</p>
              <p>
                Danira's mission is to build an honest realtionship with our
                customers and to make make the availability of authentic, tast and
                quality food products that are 100% vegeterian possible and to
                manfucature as per global standards with much love, passion and
                reliablilty.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
          <div class="main">
            <div class="head">
              <lord-icon src="https://cdn.lordicon.com/tyounuzx.json" trigger="loop" delay="100"
                colors="primary:#e83225,secondary:#e83225" stroke="85" scale="56" style="width: 60px; height: 60px"
                class="icon">
              </lord-icon>

            </div>
            <div class="content">
              <p class="top">OUR VISION</p>
              <p>
                Danira's vision is being an innovative, dynamic and socially
                resposible manufacturer which is determined to manufacture premium
                healthy food products by innovating new quality products and happy
                customers with competitve rates worldwide.
              </p>
            </div>
          </div>
        </div>
         <div class="col-lg-4 col-md-6 col-12 d-none d-md-block d-lg-none">
          <div class="main">
            <div class="head">
             <lord-icon
    src="https://cdn.lordicon.com/gqzfzudq.json"
    trigger="loop"
    colors="primary:#e83225,secondary:#e83225"
    stroke="85" scale="56" style="width: 60px; height: 60px"
                class="icon"
   >
</lord-icon>
            </div>
            <div class="content">
              <p class="top">OUR PLANS</p>
              <p>
                Danira's plan is being an innovative, dynamic and socially
                resposible manufacturer which is determined to manufacture premium
                healthy food products by innovating new quality products and happy
                customers with competitve rates worldwide.
              </p>
            </div>
          </div>
        </div>
    </section>

    <section class="why normalsec">
      <div class="row mx-0 px-0">
        <div class="col-md-6">
          <img src={{asset("assets/images/aboutparallax.jpg")}} alt="" class="img-fluid">
        </div>
        <div class="col-md-6">
          <div class="whyus">
          <h2>Why Choose Us ?</h2>
          <div class="line"></div>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A perspiciatis distinctio quis repellendus doloremque quisquam quasi quas architecto maiores. Sunt ipsa velit culpa aperiam! Dignissimos sed tempore corrupti. Suscipit qui quasi consequatur temporibus.<br><br> Maxime iusto reprehenderit voluptatibus adipisci ipsum libero porro laborum quo officia aliquid numquam modi quisquam rerum velit ipsa tempora, eveniet totam eos, cum minus? Deserunt reprehenderit nihil voluptatum eaque saepe vitae aliquam? Reiciendis eius beatae aliquid reprehenderit.</p>
          </div>
        </div>
      </div>
    </section>

  </div>
  <section class="aboutbanner normalsec">
    <div class="main">
      <div class="contain">
        <div class="image">
          <img src={{asset("assets/images/aboutparallax.jpg")}} alt="">
          <div class="overlay"></div>
        </div>
      </div>
      <div class="text">
        <p class="top">Discover Your Taste</p>
        <h2>We believe good food offer great smile.</h2>
        <a href="./products">Explore Products</a>
      </div>
    </div>

  </section>
  <!-- END ABOUT PAGE -->
@endsection
@section('js')
    <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
@endsection
