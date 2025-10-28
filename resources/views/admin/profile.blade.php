@extends('layouts.app')
@section('title', 'Company Profile')
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
        
        .profile-card {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        
        .form-label {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }
        
        .form-control {
            border-radius: 8px;
            border: 2px solid #e9ecef;
            padding: 0.75rem;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(230, 57, 70, 0.25);
        }
        
        .section-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 3px solid var(--primary-color);
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
        
        .input-icon {
            position: relative;
        }
        
        .input-icon i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }
        
        .input-icon .form-control {
            padding-left: 45px;
        }
    </style>
@endsection

@section('content')
    <!-- PAGE HEADER -->
    <div class="page-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="mb-2"><i class="fas fa-building"></i> Company Profile</h1>
                    <p class="mb-0 opacity-75">Manage your company information and settings</p>
                </div>
                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                    <a href="{{ route('dashboard') }}" class="btn btn-light">
                        <i class="fas fa-arrow-left me-2"></i> Back to Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <section class="py-4">
        <div class="container">
            <div class="profile-card">
                <form action="{{ route('profile.edit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- BASIC INFORMATION -->
                    <div class="mb-4">
                        <h5 class="section-title">
                            <i class="fas fa-info-circle me-2"></i> Basic Information
                        </h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Company Name</label>
                                <div class="input-icon">
                                    <i class="fas fa-building"></i>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $abt->name }}" required>
                                </div>
                                @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email Address</label>
                                <div class="input-icon">
                                    <i class="fas fa-envelope"></i>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $abt->email }}" required>
                                </div>
                                @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone Number</label>
                                <div class="input-icon">
                                    <i class="fas fa-phone"></i>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $abt->phone }}" required>
                                </div>
                                @error('phone') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="address" class="form-label">Address</label>
                                <div class="input-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <input type="text" class="form-control" id="address" name="address" value="{{ $abt->address }}" required>
                                </div>
                                @error('address') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="website" class="form-label">Website</label>
                                <div class="input-icon">
                                    <i class="fas fa-globe"></i>
                                    <input type="url" class="form-control" id="website" name="website" value="{{ $abt->website }}" required>
                                </div>
                                @error('website') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="logo" class="form-label">Company Logo</label>
                                <div class="input-icon">
                                    <i class="fas fa-image"></i>
                                    <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
                                </div>
                                <small class="text-muted">Leave empty to keep current logo</small>
                                @error('logo') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <!-- SOCIAL MEDIA -->
                    <div class="mb-4">
                        <h5 class="section-title">
                            <i class="fas fa-share-alt me-2"></i> Social Media Links
                        </h5>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="fb" class="form-label">Facebook</label>
                                <div class="input-icon">
                                    <i class="fab fa-facebook"></i>
                                    <input type="url" class="form-control" id="fb" name="fb" value="{{ $abt->facebook }}" placeholder="https://facebook.com/yourpage">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="insta" class="form-label">Instagram</label>
                                <div class="input-icon">
                                    <i class="fab fa-instagram"></i>
                                    <input type="url" class="form-control" id="insta" name="insta" value="{{ $abt->instagram }}" placeholder="https://instagram.com/yourpage">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="tw" class="form-label">Twitter</label>
                                <div class="input-icon">
                                    <i class="fab fa-twitter"></i>
                                    <input type="url" class="form-control" id="tw" name="tw" value="{{ $abt->twitter }}" placeholder="https://twitter.com/yourpage">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SUBMIT BUTTON -->
                    <div class="text-center mt-4">
                        <button type="submit" class="btn-update">
                            <i class="fas fa-save me-2"></i> Update Profile
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- BOOTSTRAP 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
