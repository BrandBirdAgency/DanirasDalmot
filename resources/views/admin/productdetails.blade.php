@extends('layouts.app')
@section('title', 'Product Details')
@section('css')
<!-- BOOTSTRAP 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- FONTAWESOME 6 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

<link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}" />

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

    .product-details-card {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .product-image-container {
        border-radius: 12px;
        overflow: hidden;
        border: 3px solid #e9ecef;
    }

    .product-image-container img {
        width: 100%;
        height: auto;
        display: block;
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--dark-color);
        margin-bottom: 1rem;
    }

    .detail-row {
        padding: 0.75rem 0;
        border-bottom: 1px solid #e9ecef;
    }

    .detail-row:last-child {
        border-bottom: none;
    }

    .detail-label {
        font-weight: 600;
        color: var(--dark-color);
    }

    .detail-value {
        color: #6c757d;
    }

    .badge-custom {
        padding: 0.5rem 1rem;
        border-radius: 6px;
        font-weight: 600;
    }

    .code-section {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 1.5rem;
        text-align: center;
    }

    .action-buttons .btn {
        padding: 0.75rem 2rem;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-edit {
        background: var(--primary-color);
        color: white;
        border: none;
    }

    .btn-edit:hover {
        background: #d62828;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(230, 57, 70, 0.3);
    }

    .btn-delete {
        background: #dc3545;
        color: white;
        border: none;
    }

    .btn-delete:hover {
        background: #c82333;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3);
    }

    .form-switch .form-check-input {
        width: 3rem;
        height: 1.5rem;
        cursor: pointer;
    }

    .form-switch .form-check-input:checked {
        background-color: var(--success-color);
        border-color: var(--success-color);
    }
</style>
@endsection

@section('content')
@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {!! Session::get('success') !!}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- PAGE HEADER -->
<div class="page-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="mb-2"><i class="fas fa-box-open"></i> Product Details</h1>
                <p class="mb-0 opacity-75">View complete product information</p>
            </div>
            <div class="col-md-6 text-md-end mt-3 mt-md-0">
                <a href="{{ route('product.index') }}" class="btn btn-light">
                    <i class="fas fa-arrow-left me-2"></i> Back to Products
                </a>
            </div>
        </div>
    </div>
</div>

<!-- DELETE MODAL -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this product? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="{{ route('product.delete', ['id' => $product->id]) }}" class="btn btn-danger">Delete
                    Product</a>
            </div>
        </div>
    </div>
</div>

<!-- MAIN CONTENT -->
<section class="py-4">
    <div class="container">
        <div class="product-details-card">
            <div class="row g-4">
                <!-- PRODUCT IMAGE -->
                <div class="col-lg-5">
                    <div class="product-image-container">
                        <img src="{{ Storage::url($product->photo) }}" alt="{{ $product->name }}">
                    </div>
                </div>

                <!-- PRODUCT INFORMATION -->
                <div class="col-lg-7">
                    <h2 class="section-title">{{ $product->name }}</h2>
                    <p class="text-muted mb-4">{{ $product->description }}</p>

                    <!-- BASIC DETAILS -->
                    <div class="mb-4">
                        <h5 class="fw-bold mb-3"><i class="fas fa-info-circle me-2"></i> Basic Information</h5>
                        <div class="detail-row">
                            <span class="detail-label">Category:</span>
                            <span class="detail-value ms-2">{{ $product->category }}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Brand Name:</span>
                            <span class="detail-value ms-2">{{ $product->brand_name }}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Size:</span>
                            <span class="detail-value ms-2">{{ $product->size }}</span>
                        </div>
                    </div>

                    <!-- PRICING -->
                    <div class="mb-4">
                        <h5 class="fw-bold mb-3"><i class="fas fa-tag me-2"></i> Pricing</h5>
                        <div class="detail-row">
                            <span class="detail-label">Retail Price:</span>
                            <span class="detail-value ms-2">${{ $product->retail_price }}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Selling Price:</span>
                            <span class="detail-value ms-2">${{ $product->price }}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Discount:</span>
                            <span class="badge bg-warning text-dark ms-2">{{ $product->discount }}%</span>
                        </div>
                    </div>

                    <!-- STOCK & DISPLAY CONTROLS -->
                    <div class="mb-4">
                        <h5 class="fw-bold mb-3"><i class="fas fa-sliders-h me-2"></i> Controls</h5>
                        <div class="detail-row">
                            <span class="detail-label">In Stock:</span>
                            <div class="form-check form-switch d-inline-block ms-3">
                                <input class="form-check-input" type="checkbox" name="stock"
                                    id="stock-{{ $product->id }}" product_id="{{ $product->id }}"
                                    value="{{ $product->in_stock }}" {{ $product->in_stock ? 'checked' : '' }}>
                            </div>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Show In Home:</span>
                            <div class="form-check form-switch d-inline-block ms-3">
                                <input class="form-check-input" type="checkbox" name="home" id="home-{{ $product->id }}"
                                    product_id="{{ $product->id }}" value="{{ $product->home }}" {{ $product->home ?
                                'checked' : '' }}>
                            </div>
                        </div>
                    </div>

                    <!-- CODES -->
                    <div class="mb-4">
                        <h5 class="fw-bold mb-3"><i class="fas fa-qrcode me-2"></i> Codes</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="code-section">
                                    <p class="fw-bold mb-2">Bar Code</p>
                                    @if ($product->bar_code != null)
                                    {!! $product->bar_code !!}
                                    @else
                                    <img src="{{ $product->bar_path }}" alt="Barcode" class="img-fluid">
                                    @endif
                                    <a href="{{ route('qrcode.download', $product->id) }}"
                                        class="btn btn-sm btn-outline-primary mt-2">
                                        <i class="fas fa-download me-1"></i> Download
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="code-section">
                                    <p class="fw-bold mb-2">QR Code</p>
                                    @if ($product->qr_code != null)
                                    {!! $product->qr_code !!}
                                    @else
                                    <img src="{{ $product->qr_path }}" alt="QR Code" class="img-fluid">
                                    @endif
                                    <a href="{{ route('qrcode.download', $product->id) }}"
                                        class="btn btn-sm btn-outline-primary mt-2">
                                        <i class="fas fa-download me-1"></i> Download
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ACTION BUTTONS -->
                    <div class="action-buttons d-flex gap-2">
                        <a href="{{ route('product.edit', ['id' => $product->id]) }}" class="btn btn-edit">
                            <i class="fas fa-edit me-2"></i> Edit Product
                        </a>
                        <button type="button" class="btn btn-delete" data-bs-toggle="modal"
                            data-bs-target="#deleteModal">
                            <i class="fas fa-trash me-2"></i> Delete Product
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- BOOTSTRAP 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- JQUERY -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Stock toggle
        $("input[name='stock']").change(function() {
            var display = $(this).attr('value');
            var productId = $(this).attr("product_id");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: "{{ route('updateProductStock') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    display: display,
                    productId: productId
                },
                success: function(resp) {
                    console.log('Stock status updated');
                },
                error: function() {
                    alert("Error updating stock status");
                }
            });
        });

        // Home display toggle
        $("input[name='home']").change(function() {
            var display = $(this).attr('value');
            var productId = $(this).attr("product_id");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: "{{ route('updateHome') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    display: display,
                    productId: productId
                },
                success: function(resp) {
                    console.log('Home display updated');
                },
                error: function() {
                    alert("Error updating home display");
                }
            });
        });
</script>
@endsection