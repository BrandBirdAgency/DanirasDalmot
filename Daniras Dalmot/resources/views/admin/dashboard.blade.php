@extends('layouts.app')
@section('title','Dashboard')
@section('css')
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="{{asset('/assets/css/admin.css')}}" />
@endsection

@section('content')
    <section id="admin-dashboard">
        <div class="container">
            <div class="row justify-content-center">
                <h3 class="mb-5">Admin Dashboard</h3>
            </div>
            <div class="row">
                <div class="col-md-3 col-12 col-sm-6 d-flex justify-content-center justify-content-sm-start mb-4">
                    <a href={{route('orders')}}>
                        <div class="admin-box">
                            <img src="{{asset('/assets/images/order.png')}}" alt="">
                            <p>Orders </p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-12 col-sm-6 d-flex justify-content-center justify-content-sm-start mb-4">
                    <a href={{route('teams')}}>
                        <div class="admin-box">
                            <img src="{{asset('/assets/images/team.png')}}" alt="">
                            <p>Teams </p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-12 col-sm-6 d-flex justify-content-center justify-content-sm-start mb-4">
                    <div class="admin-box">
                        <a href={{route('product.index')}}>
                            <img src="{{asset('/assets/images/box.png')}}" alt="">
                            <p>Products </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product details ends  -->
    <!-- Modal for adding team members -->
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
                  <form action={{route('addrecord')}} method="POST" enctype="multipart/form-data">
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
                              enctype="multipart/form-data"
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
    </section>
@endsection


@section('js')
    <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
@endsection
