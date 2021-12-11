@extends('layouts.app')
@section('title', 'Add Product')
@section('css')
    <!-- CSS -->
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{ asset('/assets/css/admin.css') }}" />
@endsection
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {!! Session::get('success') !!}
        </div>
    @endif
    <!--Add Product button-->
    <div class="back-btn">
        <a href="{{ route('dashboard') }}" class="btn ml-4 mb-3">Back</a>
    </div>
    <div class="nav-btns">
        <a href={{ route('addproduct') }} type="button" class="add"><i class="fa fa-plus plus"></i>Add product</a>
    </div>
    <!--Add Product button end-->

    <!-- Modal for delete  -->
    <div class="modal fade" id="delete" aria-labelledby="Title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" id="delete-model">
                <div class="modal-header">
                    <h5 class="modal-title" id="Title">
                        Do you want to delete this product?
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
    <!--Prouduct details-->
    <div class="containers allproduct" id="card-container">
        <div class="row">
            @forelse ($products as $p)
                <div class="col-lg-3 col-md-4 col-6 py-3">
                    <a href={{ route('product.show', ['id' => $p->id]) }}>
                        <div class="card card-text-center" id="product-card">
                            <img src="{{ Storage::url($p->photo) }}" class="card-img-top" />
                            <div class="card-body product-body">
                                <p class="card-title">{{ $p->name }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="no-content">
                    <h4>{{ 'Products Unavailable' }}</h4>
                </div>
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
