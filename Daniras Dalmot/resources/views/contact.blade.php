@extends('layouts.app')
@section('title','Contact')
@section('css')
<link rel="stylesheet" href={{asset("assets/css/contact.min.css")}}>
<link rel="stylesheet" href={{asset("assets/css/style.min.css")}} />

@endsection
@section('content')

<!-- MAIN BANNER -->
<div class="teambanner">
  <div class="contain">
    <div class="container" style="z-index: 10">
      @if (Session::has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {!! Session::get('success') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
    </div>

    <div class="image">
      <img src={{asset("assets/images/bg.jpg")}} alt="" />
    </div>
    <div class="image-overlay"></div>
    <div class="text">
      <div class="headings">
        <h1 class="">CONTACT</h1>
        <div class="bannerline"></div>
      </div>
      <div class="bannernav">
        <li><i class="fas fa-home"></i></li>
        <li><a href={{route('homepage')}}>HOME</a></li>
        <li><i class="fas fa-caret-right"></i></li>
        <li><a href={{route('contactpage')}}>CONTACT</a></li>
      </div>
    </div>
  </div>
</div>
<!-- END MAIN BANNER -->

<section class="ftco-section normalsec">
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
                <form method="POST" id="contactForm" name="contactForm" class="contactForm"
                  action={{route('contactadmin')}}>
                  @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" />
                        @error('name')
                        {{$message}}
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" />
                      </div>
                      @error('email')
                      {{$message}}
                      @enderror
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" />
                      </div>
                      @error('subject')
                      {{$message}}
                      @enderror
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <textarea name="message" class="form-control" id="message" cols="30" rows="6"
                          placeholder="Message"></textarea>
                      </div>
                      @error('message')
                      {{$message}}
                      @enderror
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="submit" value="Send Message" class="submit-btn" />
                        <div class="submitting"></div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-md-6 d-flex align-items-stretch">
              <div class="info-wrap w-100 p-lg-5 p-4 img">
                <h3 style="display:flex; justify-content:space-between;">
                  Contact us
                  @if (Auth::guard('web')->check())
                  <a style="cursor: pointer" data-toggle="modal" data-target="#myModal"><i
                      class="fas fa-pencil-alt"></i></a>
                  @endif
                </h3>
                <!-- The Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Contact Information</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body contact-edit">
                        <form action="{{route('companyInfoEdit')}}" method="POST">
                          @csrf
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" value="{{$about->name}}" id="name"
                                  name="name" />
                                @error('name') {{$message}} @enderror
                              </div>
                              <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" class="form-control" value="{{$about->address}}" id="address"
                                  name="address" />
                                @error('address') {{$message}} @enderror
                              </div>
                              <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input type="text" class="form-control" value="{{$about->phone}}" id="phone"
                                  name="phone" />
                                @error('phone') {{$message}} @enderror
                              </div>
                              <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" value="{{$about->email}}" id="email"
                                  name="email" />
                                @error('email') {{$message}} @enderror
                              </div>
                            </div>
                            <div class="col">
                              <div class="form-group">
                                <label for="website">Website:</label>
                                <input type="text" class="form-control" value="{{$about->website}}" id="website"
                                  name="website" />
                                @error('website') {{$message}} @enderror
                              </div>
                              <div class="form-group">
                                <label for="facebook">Facebook:</label>
                                <input type="text" class="form-control" value="{{$about->facebook}}" id="facebook"
                                  name="facebook" />
                                @error('website') {{$message}} @enderror
                              </div>
                              <div class="form-group">
                                <label for="instagram">Instagram:</label>
                                <input type="text" class="form-control" value="{{$about->instagram}}" id="instagram"
                                  name="instagram" />
                                @error('website') {{$message}} @enderror
                              </div>
                              <div class="form-group">
                                <label for="twitter">Twitter:</label>
                                <input type="text" class="form-control" value="{{$about->twitter}}" id="twitter"
                                  name="twitter" />
                                @error('website') {{$message}} @enderror
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
                <p class="mb-4">
                  We're open for any suggestion or just to have a chat
                </p>
                <div class="dbox w-100 d-flex align-items-start">
                  <div class="
                            icon
                            d-flex
                            align-items-center
                            justify-content-center
                          ">
                    <span class="fa fa-map-marker"></span>
                  </div>
                  <div class="text pl-3">
                    <p class="text-dark mt-2">{{$about->address}}</p>
                  </div>
                </div>
                <div class="dbox w-100 d-flex align-items-center">
                  <div class="
                            icon
                            d-flex
                            align-items-center
                            justify-content-center
                          ">
                    <span class="fa fa-phone"></span>
                  </div>
                  <div class="text pl-3">
                    <p>
                      <a href="tel:{{$about->phone}}" class="text-dark">{{$about->phone}}</a>
                    </p>
                  </div>
                </div>
                <div class="dbox w-100 d-flex align-items-center">
                  <div class="
                            icon
                            d-flex
                            align-items-center
                            justify-content-center
                          ">
                    <span class="fa fa-paper-plane"></span>
                  </div>
                  <div class="text pl-3">
                    <p>
                      <a href="mailto:{{$about->email}}" class="text-dark">{{$about->email}}</a>
                    </p>
                  </div>
                </div>
                <div class="dbox w-100 d-flex align-items-center">
                  <div class="
                            icon
                            d-flex
                            align-items-center
                            justify-content-center
                          ">
                    <span class="fa fa-globe"></span>
                  </div>
                  <div class="text pl-3">
                    <p>
                      <a target="_blank" href="{{$about->website}}" class="text-dark">{{$about->website}}</a>
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
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3553.8693240452435!2d84.90640731485557!3d27.034294883075386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3993554b072649b3%3A0xb7fdfeee98289715!2sDanira&#39;s%20Dalmoth!5e0!3m2!1sen!2snp!4v1634834105799!5m2!1sen!2snp"
    width="100%" height="500" style="border: 0" allowfullscreen loading="lazy"></iframe>
</div>
@endsection
@section('js')
<script src={{asset("js/jquery.min.js")}}></script>
<script src={{asset("js/popper.js")}}></script>
<script src={{asset("js/jquery.validate.min.js")}}></script>
<script src={{asset("js/contact.min.js")}}></script>
@endsection