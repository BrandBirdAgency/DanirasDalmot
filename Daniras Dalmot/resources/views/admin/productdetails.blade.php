@extends('layouts.app')
@section('title','Product Details')
@section('css')

  <!-- CSS -->
    <!-- Add icon library -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href={{asset("assets/css/admin.css")}} />
@endsection
@section('content')
<div class="back-btn">
  <a href="#/" class="btn ml-4 mb-3">Back</a>
</div>

    <!-- Modal for delete  -->
    <div
      class="modal fade"
      id="productdeletemodal"
      aria-labelledby="Title"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" id="productdeletemodal">
          <div class="modal-header">
            <h5 class="modal-title" id="Title">
              Do you want to delete this product?
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span class="cross" aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Do you really want to delete the product?
          </div>
          <div class="card-footer">
            <div class="delete-button">
              <a href={{route("product.delete",['id'=>$product->id])}} style="text-decoration: none;color:white;"><button type="button" class="btn">YES</button></a>
              <button type="button" class="btn" data-dismiss="modal">NO</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal for delete ends  -->
         <section id="display-product">
        <div class="product-main">
          <div class="product-image">
            <img src="{{Storage::url($product->photo)}}" alt="" />

          </div>
          <div class="product-details">
            <div class="product-name">
                <div class="title">
              <h4>{{$product->name}}</h4>
</div>
            </div>


            <div class="product-desc">
              <p class="der">
                {{$product->description}}
              </p>
</div>
 <div class="line"></div>
<div class="product-info">
     <p class="dets"><span>Product Details & Controls</span></p>
    <div class="row">

        <div class="col-md-6">
              <p class="det"><span>Category :</span> {{$product->category}}</p>
              <p class="det"><span>Size : </span>{{$product->size}}</p>
              <p class="det"><span>Brand Name : </span>{{$product->brand_name}}</p>
            <p>In Stock :  <label class="switch ml-2">

  <input type="checkbox" checked>
  <span class="slider round"></span>
</label> </p>



</div>
<div class="col-md-6">
              <p class="det"><span>Retail Price :</span> {{$product->retail_price}}</p>
              <p class="det"><span>Price : </span>{{$product->price}}</p>
              <p class="det"><span>Discount :</span> {{$product->discount}}%</p>
                            <p>Show In Home :  <label class="switch ml-2">

  <input type="checkbox" checked>
  <span class="slider round"></span>
</label></p>
</div>
</div>
            </div>
 <div class="line"></div>
            <div class="images codes">
                <div class="bar-code">
                    <p class="det"><span>Bar-Code : <a href="{{ route('qrcode.download', $product->id) }}" role="button"class="btn download" data-toggle="tooltip" data-placement="top" title="Download bar code">
                      <i class="fas fa-download"></i>
                    </a></span></p>
  @if($product->bar_code!=NULL)

      {!! $product->bar_code!!}
  @else

  <img
  src="{{$product->bar_path}}"
  alt="team"
  class="img-fluid"
/>
      @endif
</div>
<div class="qr-code">
    <p class="det"><span>Qr-Code : <a href="{{ route('qrcode.download', $product->id) }}" role="button" data-toggle="tooltip" data-placement="top" title="Download qr code">
                      <i class="fas fa-download"></i>
    </a></span></p>
    @if($product->qr_code!=NULL)

        {!! $product->qr_code!!}
    @else

          <img
              src="{{$product->qr_path}}"
              alt="team"
              class="img-fluid"
          />
        @endif
</div>
            </div>

            <div class="buttons d-flex align-items-center">
              <a href={{route('product.edit',['id'=>$product->id])}} class="mr-2">Edit</a>

              <button data-toggle="modal" data-target="#productdeletemodal">Delete</button>
            </div>
            <div class="line"></div>

          </div>



        </div>
      </section>

@endsection
@section('js')
        <!-- Script Source Files -->
        <script src="script.js"></script>
        <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
        <script>
          $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
        </script>
@endsection
