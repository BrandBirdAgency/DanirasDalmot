<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" type="text/css" href="vendor/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="vendor/css/bootstrap.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600;700&display=swap" rel="stylesheet" />

    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" />
    <!-- CSS -->
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="./assets/css/admin.css" />
</head>

<body>
    <!-- HEADER -->
    <header>
        <a class="logo" href="/"><img src="./assets/images/logo.jpg" alt="logo" /></a>
        <nav>
            <ul class="nav__links">
                <li><a href="{{ route('homepage') }}">Home</a></li>
                <li><a href="{{ route('productpage') }}">Products</a></li>
                <li><a href="{{ route('teampage') }}">Team</a></li>
                <li><a href="{{ route('aboutpage') }}">About</a></li>

                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf

                </form>
            </ul>
        </nav>
        <a class="cta" href="{{ route('contactpage') }}">Contact</a>
        <p class="menu cta">Menu</p>
    </header>
    <div id="mobile__menu" class="overlay">
        <a class="close">&times;</a>
        <div class="overlay__content">
            <a href="{{ route('homepage') }}">Home</a>
            <a href="{{ route('productpage') }}">Products</a>
            <a href="{{ route('teampage') }}">Team</a>
            <a href="{{ route('aboutpage') }}">About</a>
            <a href="{{ route('contactpage') }}">Contact</a>
            <a href={{ route('logout') }}>Logout</a>
        </div>
    </div>
    <!-- END HEADER -->

    <!--Add Product button-->

    <a href={{ route('addproduct') }} type="button" class="add"><i class="fa fa-plus plus"></i>Add product</a>
    <!--Add Product button end-->

    <!-- Modal for delete  -->
    <div class="modal fade" id="delete" aria-labelledby="Title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Title">
                        Do you want to delete this product?
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">...</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal for delete ends  -->
    <!--Prouduct details-->
    <div class="container-fluid" id="product-fluid">
        <div class="row">
            <div class="col sm-4 py-2">
                <div class="card">
                    <img src="./assets/images/3.png" class="card-img-top img-1" />
                    <div class="card-body">
                        <h1 class="card-title">Dalmoth-A</h1>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                        <div class="card-footer">
                            <div class="btn-group">
                                <button class="edit"><i class="fa fa-edit"></i>Edit</button>
                                <button class="delete" data-toggle="modal" data-target="#delete">
                                    <i class="fa fa-trash"></i>Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col sm-4 py-2">
                <div class="card">
                    <img src="./assets/images/1.png" class="card-img-top img-1" />
                    <div class="card-body">
                        <h1 class="card-title">Dalmoth-B</h1>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                        <div class="card-footer">
                            <div class="btn-group">
                                <button class="edit"><i class="fa fa-edit"></i>Edit</button>
                                <button class="delete" data-toggle="modal" data-target="#delete">
                                    <i class="fa fa-trash"></i>Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col sm-4 py-2">
                <div class="card">
                    <img src="./assets/images/2.png" class="card-img-top img-1" />
                    <div class="card-body">
                        <h1 class="card-title">Dalmoth-C</h1>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                        <div class="card-footer">
                            <div class="btn-group">
                                <button class="edit"><i class="fa fa-edit"></i>Edit</button>
                                <button class="delete" data-toggle="modal" data-target="#delete">
                                    <i class="fa fa-trash"></i>Delete
                                </button>
                            </div>
                        </div>
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

    <!-- FOOTER -->

    <div class="footer-basic">
        <footer>
            <div class="social">
                <a href="#"><i class="icon ion-social-facebook"></i></a>
                <a href="#"><i class="icon ion-social-instagram"></i></a>
                <a href="#"><i class="icon ion-social-twitter"></i></a>
            </div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="{{ route('homepage') }}">Home</a></li>
                <li class="list-inline-item"><a href="{{ route('productpage') }}">Products</a></li>
                <li class="list-inline-item"><a href="{{ route('teampage') }}">Team</a></li>
                <li class="list-inline-item"><a href="{{ route('aboutpage') }}">About</a></li>
                <li class="list-inline-item"><a href="{{ route('contactpage') }}">Contact</a></li>
            </ul>
            <p class="copyright">Daniras Dalmoth © {{ date('Y') }}</p>
        </footer>
    </div>

    <!-- FOOTER END -->

    <!-- FOOTER END -->
    <!-- Script Source Files -->
    <script src="script.js"></script>
    <script src="vendor/js/jquery-3.6.0.min.js"></script>
    <script src="./assets/js/main.js"></script>
    <script src="./vendor/js/aos.js"></script>
    <script src="vendor/js/jquery.waypoints.js"></script>
    <script src="vendor/js/jquery.counterup.js"></script>
    <script src="vendor/js/bootstrap.min.js"></script>
    <script src="vendor/js/bootstrap.bundle.js"></script>
    <script src="vendor/js/popper.min.js"></script>
    <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
</body>

</html>
