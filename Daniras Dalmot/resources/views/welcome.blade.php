@extends('layouts.app')

@section('title',"Home")

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
@endsection

