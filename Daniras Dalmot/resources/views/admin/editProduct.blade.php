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
    <!-- Add product -->
    <div class="container" id="add-product-container">
        <div class="card" id="add-product-card">
          <div class="text-center add-product-heading">
            <h3>Add Product</h3>
            <div class="line"></div>
          </div>
          <form class="card-body add-product-body" method="POST" action={{route('product.update',['id'=>$product->id])}} enctype="multipart/form-data">
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
                    value={{$product->name}}
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
                  >{{$product->description}}</textarea>
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
                    value={{$product->size}}
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
                    value={{$product->brand_name}}
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
                    value={{$product->retail_price}}
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
                    value={{$product->price}}
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
                    value={{$product->discount}}
                  />
                  @error('discount')
                  {{$message}}
              @enderror
                </div>
              </div>

              <div class="col-md-4 col-12 text-left">
                <div class="form-group">
                  <label for="inputfile" class="">Product Image </label>
                  <div class="upload">
                    <input type="file" name='photo' accept="image/*" id="real-file" hidden="hidden" />
                    <button type="button" id="custom-button" class="btn">
                      Choose an image
                    </button>
                    <p id="custom-text">No file chosen, yet.</p>
                  </div>
                  @error('image')
                    {{$message}}
                    @enderror
                </div>
                <div class="form-group">
                  <label for="inputfile" class="">Bar Code </label>
                  <div class="upload">
                    <input type="file"  id="real-file" hidden="hidden" />
                    <button type="button" id="custom-button" class="btn">
                      Choose an image
                    </button>
                    <p id="custom-text">No file chosen, yet.</p>

                  </div>
                </div>
                <div class="form-group">
                  <label for="inputfile" class="">Qr Code </label>
                  <div class="upload">
                    <input type="file" id="real-file" hidden="hidden" />
                    <button type="button" id="custom-button" class="btn">
                      Choose an image
                    </button>
                    <p id="custom-text">No file chosen, yet.</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="submitbtn">
              <button type="submit" class="btn upload">
                <small> Upload</small>
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
      const realFileBtn = document.getElementById("real-file");
      const customBtn = document.getElementById("custom-button");
      const customTxt = document.getElementById("custom-text");

      customBtn.addEventListener("click", function () {
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
    </script>
    @endsection
