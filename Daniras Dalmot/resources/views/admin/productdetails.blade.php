@extends('layouts.app')
@section('title','Add Product')
@section('css')

  <!-- CSS -->
    <!-- Add icon library -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="./assets/css/admin.css" />
@endsection
@section('content')


    <!-- Modal for delete  -->
    <div
      class="modal fade"
      id="delete"
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
              <button type="button" class="btn">YES</button>
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
            <img src="./assets/images/0.png" alt="" />
              
          </div>
          <div class="product-details">
            <div class="product-name">
                <div class="title">
              <h4>Mixture Dalmot</h4>
</div>
            </div>
   
      
            <div class="product-desc">
              <p class="der">
             Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatibus inventore sed consequuntur nesciunt qui incidunt necessitatibus temporibus veniam eum harum.
              </p>
</div>
 <div class="line"></div>
<div class="product-info">
     <p class="dets"><span>Product Details & Controls</span></p>
    <div class="row">
       
        <div class="col-md-6">
              <p class="det"><span>Category :</span> something</p>
              <p class="det"><span>Size : </span>something</p>
              <p class="det"><span>Brand Name : </span>something</p>
            <p>In Stock :  <label class="switch ml-2">
                
  <input type="checkbox" checked>
  <span class="slider round"></span>
</label></p>



</div>
<div class="col-md-6">
              <p class="det"><span>Retail Price :</span> 120</p>
              <p class="det"><span>Price : </span>150</p>
              <p class="det"><span>Discount :</span> 10%</p>
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
                    <p class="det"><span>Bar-Code : </span></p>
                <img src="./assets/images/team1.jpg" alt="">
</div>
<div class="qr-code">
    <p class="det"><span>Qr-Code : </span></p>
                <img src="./assets/images/team1.jpg" alt="">
</div>
            </div>
    
            <div class="buttons d-flex align-items-center">
              <a href="#/" class="mr-2">Edit</a>
            
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
@endsection
