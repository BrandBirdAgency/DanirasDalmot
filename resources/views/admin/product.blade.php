@extends('layouts.app')
@section('title', 'Products Management')
@section('css')
<!-- BOOTSTRAP 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- FONTAWESOME 6 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

<link rel="stylesheet" href="{{ asset('/assets/css/admin.css') }}" />

<style>
    :root {
        --primary-color: #e63946;
        --success-color: #06d6a0;
        --dark-color: #1d3557;
    }

    body {
        background: #f8f9fa;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    .page-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, #d62828 100%);
        color: white;
        padding: 2rem 0;
        margin-bottom: 2rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .product-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        height: 100%;
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    }

    .product-image {
        width: 100%;
        height: 250px;
        object-fit: cover;
        background: #f8f9fa;
    }

    .product-body {
        padding: 1.5rem;
    }

    .product-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--dark-color);
        margin-bottom: 0.5rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .product-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background: var(--success-color);
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .product-badge.out-stock {
        background: var(--primary-color);
    }

    .add-product-btn {
        background: var(--primary-color);
        color: white;
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .add-product-btn:hover {
        background: #d62828;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(230, 57, 70, 0.3);
    }

    .no-content {
        text-align: center;
        padding: 4rem 2rem;
        color: #6c757d;
    }

    .no-content i {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }

    .stats-row {
        margin-bottom: 2rem;
    }

    .stat-box {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        border-left: 4px solid;
    }

    .stat-box.total {
        border-left-color: var(--primary-color);
    }

    .stat-box.in-stock {
        border-left-color: var(--success-color);
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 700;
        color: var(--dark-color);
    }

    .stat-label {
        color: #6c757d;
        font-size: 0.9rem;
        text-transform: uppercase;
    }
</style>
@endsection

@section('content')
<!-- PAGE HEADER -->
<div class="page-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="mb-2"><i class="fas fa-boxes"></i> Products Management</h1>
                <p class="mb-0 opacity-75">Manage your product inventory</p>
            </div>
            <div class="col-md-6 text-md-end mt-3 mt-md-0">
                <a href="{{ route('dashboard') }}" class="btn btn-light me-2">
                    <i class="fas fa-arrow-left me-2"></i> Back
                </a>
                <a href="{{ route('addproduct') }}" class="add-product-btn">
                    <i class="fas fa-plus me-2"></i> Add Product
                </a>
            </div>
        </div>
    </div>
</div>

<!-- SUCCESS MESSAGE -->
@if (Session::has('success'))
<div class="container mb-4">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i>
        {!! Session::get('success') !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
</div>
@endif

<!-- MAIN CONTENT -->
<section class="py-4">
    <div class="container">

        <!-- STATISTICS -->
        <div class="stats-row">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="stat-box total">
                        <div class="stat-label">Total Products</div>
                        <div class="stat-number">{{ $products->count() }}</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="stat-box in-stock">
                        <div class="stat-label">In Stock</div>
                        <div class="stat-number">{{ $products->where('in_stock', 1)->count() }}</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="stat-box total">
                        <div class="stat-label">Out of Stock</div>
                        <div class="stat-number">{{ $products->where('in_stock', 0)->count() }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- PRODUCTS GRID -->
        <div class="row g-4">
            @forelse ($products as $p)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="{{ route('product.show', ['id' => $p->id]) }}" class="text-decoration-none">
                    <div class="product-card position-relative">
                        @if($p->in_stock)
                        <span class="product-badge">In Stock</span>
                        @else
                        <span class="product-badge out-stock">Out of Stock</span>
                        @endif
                        <img src="{{ Storage::url($p->photo) }}" class="product-image" alt="{{ $p->name }}">
                        <div class="product-body">
                            <h6 class="product-title">{{ $p->name }}</h6>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-primary fw-bold">NPR {{ number_format($p->price, 2) }}</span>
                                @if($p->discount > 0)
                                <span class="badge bg-danger">{{ $p->discount }}% OFF</span>
                                @endif
                            </div>
                            @if($p->category)
                            <div class="mt-2">
                                <span class="badge bg-secondary small">{{ $p->category }}</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-12">
                <div class="no-content">
                    <i class="fas fa-box-open"></i>
                    <h4>No Products Available</h4>
                    <p>Click the "Add Product" button to add your first product</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- BOOTSTRAP 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection