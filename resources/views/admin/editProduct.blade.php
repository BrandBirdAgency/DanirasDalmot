@extends('layouts.app')
@section('title', 'Edit Product')
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
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .product-card {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        
        .form-label {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }
        
        .form-control, .form-select {
            border-radius: 8px;
            border: 2px solid #e9ecef;
            padding: 0.75rem;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(230, 57, 70, 0.25);
        }
        
        .section-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--primary-color);
        }
        
        .file-upload-wrapper {
            position: relative;
            border: 2px dashed #dee2e6;
            border-radius: 8px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .file-upload-wrapper:hover {
            border-color: var(--primary-color);
            background: #fff5f6;
        }
        
        .file-upload-wrapper input[type="file"] {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }
        
        .upload-icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        
        .upload-text {
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .file-name {
            margin-top: 0.5rem;
            font-weight: 600;
            color: var(--success-color);
        }
        
        .btn-update {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 0.75rem 3rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-update:hover {
            background: #d62828;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(230, 57, 70, 0.3);
        }
    </style>
@endsection

@section('content')
    <!-- PAGE HEADER -->
    <div class="page-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="mb-2"><i class="fas fa-edit"></i> Edit Product</h1>
                    <p class="mb-0 opacity-75">Update product information</p>
                </div>
                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                    <a href="{{ route('product.index') }}" class="btn btn-light">
                        <i class="fas fa-arrow-left me-2"></i> Back to Products
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <section class="py-4">
        <div class="container">
            <div class="product-card">
                <form method="POST" action="{{ route('product.update', ['id' => $product->id]) }}" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- BASIC INFORMATION -->
                    <div class="mb-4">
                        <h5 class="section-title">
                            <i class="fas fa-info-circle me-2"></i> Basic Information
                        </h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
                                @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="brand_name" class="form-label">Brand Name</label>
                                <input type="text" class="form-control" id="brand_name" name="brand_name" value="{{ $product->brand_name }}">
                                @error('brand_name') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4">{{ $product->description }}</textarea>
                                @error('description') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select" id="category" name="category">
                                    <option value="1" {{ $product->category == '1' ? 'selected' : '' }}>Category 1</option>
                                    <option value="2" {{ $product->category == '2' ? 'selected' : '' }}>Category 2</option>
                                    <option value="3" {{ $product->category == '3' ? 'selected' : '' }}>Category 3</option>
                                    <option value="4" {{ $product->category == '4' ? 'selected' : '' }}>Category 4</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="size" class="form-label">Size</label>
                                <input type="text" class="form-control" id="size" name="size" value="{{ $product->size }}" placeholder="e.g., 500g, 1kg">
                                @error('size') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <!-- PRICING -->
                    <div class="mb-4">
                        <h5 class="section-title">
                            <i class="fas fa-tag me-2"></i> Pricing Information
                        </h5>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="retail_price" class="form-label">Retail Price</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="retail_price" name="retail_price" value="{{ $product->retail_price }}" step="0.01">
                                </div>
                                @error('retail_price') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="price" class="form-label">Selling Price</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" step="0.01">
                                </div>
                                @error('price') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="discount" class="form-label">Discount %</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="discount" name="discount" value="{{ $product->discount }}" min="0" max="100">
                                    <span class="input-group-text">%</span>
                                </div>
                                @error('discount') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <!-- IMAGE UPLOAD -->
                    <div class="mb-4">
                        <h5 class="section-title">
                            <i class="fas fa-image me-2"></i> Product Image
                        </h5>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Update Product Image</label>
                                <div class="file-upload-wrapper">
                                    <input type="file" name="photo" id="photo" accept="image/*">
                                    <div class="upload-icon"><i class="fas fa-cloud-upload-alt"></i></div>
                                    <div class="upload-text">Click to upload new product image</div>
                                    <div class="file-name" id="photo-name"></div>
                                </div>
                                <small class="text-muted">Leave empty to keep current image</small>
                                @error('image') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <!-- SUBMIT BUTTON -->
                    <div class="text-center mt-4">
                        <button type="submit" class="btn-update">
                            <i class="fas fa-save me-2"></i> Update Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- BOOTSTRAP 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // File upload handler
        document.getElementById('photo').addEventListener('change', function() {
            document.getElementById('photo-name').textContent = this.files[0]?.name || '';
        });
    </script>
@endsection
