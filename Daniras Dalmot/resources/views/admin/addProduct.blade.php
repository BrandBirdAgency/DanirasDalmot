<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Product</title>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" type="text/css" href="vendor/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="vendor/css/bootstrap.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" />
    <!-- CSS -->
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/admin.css" />
</head>

<body>
    <!-- HEADER -->
    <header>
        <a class="logo" href="/"><img src="./assets/images/logo.jpg" alt="logo" /></a>
        <nav>
            <ul class="nav__links">
                <li><a href="{{ route('homepage') }}">Home</a></li>
                <li><a href="{{ route('products.index') }}">Products</a></li>
                <li><a href="{{ route('teampage') }}">Team</a></li>
                <li><a href="{{ route('aboutpage') }}">About</a></li>
            </ul>
        </nav>
        <a class="cta" href="{{ route('contactpage') }}">Contact</a>
        <p class="menu cta">Menu</p>
    </header>
    <div id="mobile__menu" class="overlay">
        <a class="close">&times;</a>
        <div class="overlay__content">
            <a href="{{ route('homepage') }}">Home</a>
            <a href="{{ route('products.index') }}">Products</a>
            <a href="{{ route('teampage') }}">Team</a>
            <a href="{{ route('aboutpage') }}">About</a>
            <a href="{{ route('contactpage') }}">Contact</a>
        </div>
    </div>
    <!-- END HEADER -->
    <!-- Add product -->
    <div class="container" id="add-products">
        <h2 class="add">Add product</h2>
        <form class="add-product">
            @csrf
            <div class="form-group row">
                <label for="inputLocation" class="col-sm-2 col-form-label">Location</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputLocarion" value="Nepal">
                </div>
                <label for="inputCategory" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-4">
                    <select class="form-control" id="inputCategory">
                        <option selected>Choose..</option>
                        <option value="1">Lorem</option>
                        <option value="2">Lorem-1</option>
                        <option value="3">Lorem-2</option>
                        <option value="4">Lorem-3</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputproductname" class="col-sm-2 col-form-label">Product Name</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputproductname" placeholder="Enter Product Name" name='name'>
                </div>
                <label for="inputbrandname" class="col-sm-2 col-form-label">Enter Brand Name</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputbrandname" placeholder="Lorem" name='brand_name'>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputprice" class="col-sm-2 col-form-label">Size</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputprice" placeholder="Product Variance(size)">
                </div>
                <label for="inputmarkedprice" class="col-sm-2 col-form-label">Maximum retail price</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputprice" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputdiscount" class="col-sm-2 col-form-label">Discount %</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputdiscount" placeholder="10">
                </div>
                <label for="inputsp" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputsp" placeholder="180">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputstatus" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-4">
                    <select class="form-control" id="inputCategory">
                        <option selected>Available</option>
                        <option value="1">Hide</option>
                    </select>
                </div>
                <label for="inputproductdescription" class="col-sm-2  col-form-label">Product Description</label>
                <div class="col-sm-4">
                    <textarea id="inputproductdescription" class="form-control" rows="4"></textarea>
                </div>
            </div>
            <button type="button" class="upload">Upload</button>
        </form>
    </div>
    <!-- Add product -end-->








    <!-- Script Source Files -->
    <script src="add-product.js"></script>
    <script src="vendor/js/jquery-3.6.0.min.js"></script>
    <script src="./vendor/js/aos.js"></script>
    <script src="vendor/js/jquery.waypoints.js"></script>
    <script src="vendor/js/jquery.counterup.js"></script>
    <script src="vendor/js/bootstrap.min.js"></script>
    <script src="vendor/js/bootstrap.bundle.js"></script>
    <script src="vendor/js/popper.min.js"></script>
    <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>


</body>

</html>
