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
    <!--Add Product button-->

    <a href={{route('addproduct')}} type="button" class="add"
      ><i class="fa fa-plus plus"></i>Add product</a
    >
    <!--Add Product button end-->


    <!--Prouduct details-->
    <div class="container-fluid" id="product-fluid">
      <div class="row">
          @forelse ($products as $p)
          <div class="col sm-4 py-2">
            <div class="card">
              <img src={{Storage::url($p->photo)}} class="card-img-top img-1" />
              <div class="card-body">
                <h1 class="card-title">{{$p->name}}</h1>
                <p class="card-text">
                  {{$p->description}}
                </p>
                <div class="card-footer">
                  <div class="btn-group">
                    <button class="edit"><i class="fa fa-edit"></i><a href={{route('product.edit',['id'=>$p->id])}} style="text-decoration: none; color:white">Edit</a></button>
                    <button
                      class="delete"
                      data-toggle="modal"
                      data-target="#delete"
                    >
                      <i class="fa fa-trash"></i>Delete
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <!-- Modal for delete  -->
    <div
    class="modal fade"
    id="delete"
    aria-labelledby="Title"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-top">
      <div class="modal-content">
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
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">...</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary"><a href={{route('product.delete',['id'=>$p->id])}} style="text-decoration: none; color:white">Yes</a></button>
          <button
            type="button"
            class="btn btn-secondary"
            data-dismiss="modal"
          >
            Close
          </button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal for delete ends  -->
          @empty
          {{"Add Some Products"}}
          @endforelse


      </div>
    </div>


    <!-- Product details ends  -->
@endsection
@section('js')
        <!-- Script Source Files -->
        <script src="script.js"></script>
        <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
@endsection

