@extends('layouts.app')
@section('title','addProduct')
@section('css')
    <!-- CSS -->
    <!-- Add icon library -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="{{asset('/assets/css/admin.css')}}"
    />
@endsection
@section('content')
    <div class="alert alert-success alert-dismissible in">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Success!</strong> Product edited !!
    </div>

    <div class="back-btn">
  <a href="#/" class="btn ml-4 mb-3">Back</a>
</div>
    <!-- Add product -->
    <div class="container mb-5" id="add-product-container">
        <div class="card" id="add-product-card">
          <div class="text-center add-product-heading">
            <h3>Add Product</h3>
            <div class="line"></div>
          </div>
          <form class="card-body add-product-body" method="POST" action={{route('product.store')}} enctype="multipart/form-data">
              @csrf
            <div class="row">
              <div class="col-md-4 col-12">
                <div class="form-group">
                  <label for="inp" class=""> Product Name </label>

                  <input
                    type="text"
                    id="inp"
                    class="form-control form-control-sm"
                    name="name"
                  />
                  @error('name')
                      {{$message}}
                  @enderror
                </div>


                <div class="form-group">
                  <label for="inouttextarea"> Product Description</label>
                  <textarea
                    class="form-control"
                    id="inputtextarea"
                    rows="3"
                    name="description"
                  ></textarea>
                  @error('description')
                  {{$message}}
              @enderror
                </div>
                <div class="form-group">
                  <label for="inouttextarea">Category</label>
                  <select
                    id="inp"
                    class="form-control form-control-sm"
                    name="category"
                    >
                    <option >1</option>
                    <option >2</option>
                    <option >3</option>
                    <option >4</option>

                  </select>
                </div>
                <div class="form-group">
                  <label for="inouttextarea">Size</label>
                  <input
                    type="number"
                    id="inp"
                    class="form-control form-control-sm"
                    name="size"
                  />
                  @error('size')
                  {{$message}}
              @enderror
                </div>


              </div>
              <div class="col-md-4 col-12">
                <div class="form-group">
                  <label for="inp" class="">Brand Name</label>

                  <input
                    type="text"
                    id="inp"
                    class="form-control form-control-sm"
                    name="brand_name"
                  />
                  @error('brand_name')
                  {{$message}}
              @enderror
                </div>
                <div class="form-group">
                  <label for="inp" class="">Retail Price</label>

                  <input
                    type="number"
                    id="inp"
                    class="form-control form-control-sm"
                    name="retail_price"
                  />
                  @error('retail_price')
                  {{$message}}
              @enderror
                </div>
                <div class="form-group">
                  <label for="inouttextarea">Price</label>
                  <input
                    type="number"
                    id="inp"
                    class="form-control form-control-sm"
                    name="price"
                  />
                  @error('price')
                  {{$message}}
              @enderror
                </div>

                <div class="form-group">
                  <label for="inouttextarea">Discount</label>
                  <input
                    type="number"
                    id="inp"
                    class="form-control form-control-sm"
                    name="discount"
                  />
                  @error('discount')
                  {{$message}}
              @enderror
                </div>

              </div>
        

              <div class="col-md-4 col-12 text-left">
                 <div class="form-group">
                  <label for="inputtextarea">Bar Number (Optional)</label>
                  <input
                    type="number"
                    id="inp"
                    class="form-control form-control-sm"
                    name="b_num"
                  />
                  @error('price')
                    {{$message}}
                  @enderror
                </div>

                <div class="form-group">
                  <label for="inputfile" class="">Product Image </label>
                  <div class="upload">
                    <input type="file" name='photo' accept="image/*" id="real-file0" hidden="hidden" />
                    <button type="button" id="custom-button0" class="btn">
                      Choose an image
                    </button>
                    <p id="custom-text0">No file chosen, yet.</p>
                  </div>
                  @error('image')
                    {{$message}}
                    @enderror
                </div>

                <div class="form-group">
                  <label for="inputfile" class="">Qr Code </label>
                  <div class="upload">
                    <input type="file" name="qr" id="real-file2" hidden="hidden" />
                    <button type="button" id="custom-button2" class="btn">
                      Choose an image
                    </button>
                    <p id="custom-text2">No file chosen, yet.</p>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputfile" class="">Bar Code </label>
                  <div class="upload">
                    <input type="file" name="bar" id="real-file1" hidden="hidden" />
                    <button type="button" id="custom-button1" class="btn">
                      Choose an image
                    </button>
                    <p id="custom-text1">No file chosen, yet.</p>

                  </div>
                </div>
               
              </div>
            </div>

            <div class="submitbtn">
              <button type="submit" class="btn upload">
                <small> Add</small>
              </button>
            </div>
          </form>
        </div>
      </div>
@endsection
@section('js')


    <!-- Add product -end-->

    <!-- Script Source Files -->
    <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>

    <script>
      const realFileBtn0 = document.getElementById("real-file0");
      const customBtn0 = document.getElementById("custom-button0");
      const customTxt0 = document.getElementById("custom-text0");

      customBtn0.addEventListener("click", function () {
        console.log("shubha")
        realFileBtn0.click();
      });

      realFileBtn0.addEventListener("change", function () {
        if (realFileBtn0.value) {
          customTxt0.innerHTML = realFileBtn0.value.match(
            /[\/\\]([\w\d\s\.\-\(\)]+)$/
          )[1];
        } else {
          customTxt0.innerHTML = "No file choosen, yet.";
        }
      });
       const realFileBtn1 = document.getElementById("real-file1");
      const customBtn1 = document.getElementById("custom-button1");
      const customTxt1 = document.getElementById("custom-text1");

      customBtn1.addEventListener("click", function () {
        realFileBtn1.click();
      });

      realFileBtn1.addEventListener("change", function () {
        if (realFileBtn1.value) {
          customTxt1.innerHTML = realFileBtn1.value.match(
            /[\/\\]([\w\d\s\.\-\(\)]+)$/
          )[1];
        } else {
          customTxt1.innerHTML = "No file choosen, yet.";
        }
      });
       const realFileBtn2 = document.getElementById("real-file2");
      const customBtn2 = document.getElementById("custom-button2");
      const customTxt2 = document.getElementById("custom-text2");

      customBtn2.addEventListener("click", function () {
        realFileBtn2.click();
      });

      realFileBtn2.addEventListener("change", function () {
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
