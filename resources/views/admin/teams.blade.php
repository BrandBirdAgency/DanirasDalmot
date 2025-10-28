@extends('layouts.app')
@section('title', 'Team Management')
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
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .team-card {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .team-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.15);
        }
        
        .team-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid var(--primary-color);
            margin: 0 auto 1rem;
            display: block;
        }
        
        .team-name {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }
        
        .team-position {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 0.25rem;
        }
        
        .team-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .team-badge.daniras {
            background: rgba(230, 57, 70, 0.1);
            color: var(--primary-color);
        }
        
        .team-badge.brandbir {
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
        }
        
        .team-actions {
            display: flex;
            gap: 0.5rem;
            justify-content: center;
            margin-top: 1rem;
        }
        
        .btn-action {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            transition: all 0.3s ease;
        }
        
        .btn-edit {
            background: rgba(6, 214, 160, 0.1);
            color: var(--success-color);
        }
        
        .btn-edit:hover {
            background: var(--success-color);
            color: white;
        }
        
        .btn-delete {
            background: rgba(230, 57, 70, 0.1);
            color: var(--primary-color);
        }
        
        .btn-delete:hover {
            background: var(--primary-color);
            color: white;
        }
        
        .add-member-btn {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .add-member-btn:hover {
            background: #d62828;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(230, 57, 70, 0.3);
        }
        
        .modal-content {
            border-radius: 12px;
            border: none;
        }
        
        .modal-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #d62828 100%);
            color: white;
            border-radius: 12px 12px 0 0;
        }
        
        .modal-header .btn-close {
            filter: brightness(0) invert(1);
        }
        
        .form-label {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
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
    </style>
@endsection

@section('content')
    <!-- PAGE HEADER -->
    <div class="page-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="mb-2"><i class="fas fa-users"></i> Team Management</h1>
                    <p class="mb-0 opacity-75">Manage your team members</p>
                </div>
                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                    <a href="{{ route('dashboard') }}" class="btn btn-light">
                        <i class="fas fa-arrow-left me-2"></i> Back to Dashboard
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
            
            <!-- ADD MEMBER BUTTON -->
            <div class="mb-4 text-end">
                <button class="add-member-btn" data-bs-toggle="modal" data-bs-target="#addModal">
                    <i class="fas fa-plus me-2"></i> Add Team Member
                </button>
            </div>

            <!-- TEAM MEMBERS GRID -->
            <div class="row g-4">
                @forelse ($teams as $team)
                    <div class="col-lg-4 col-md-6">
                        <div class="team-card text-center">
                            <img src="{{ $team->photo }}" alt="{{ $team->name }}" class="team-photo">
                            <h5 class="team-name">{{ $team->name }}</h5>
                            <p class="team-position">{{ $team->position }}</p>
                            <span class="team-badge {{ $team->team_id ? 'brandbir' : 'daniras' }}">
                                {{ $team->team_id ? 'Brand Bird' : 'Daniras' }}
                            </span>
                            <div class="text-muted small mb-2">
                                <i class="fas fa-phone me-2"></i>{{ $team->phone }}
                            </div>
                            <div class="text-muted small mb-3">
                                <i class="fas fa-map-marker-alt me-2"></i>{{ $team->address }}
                            </div>
                            <div class="d-flex justify-content-center gap-2 mb-3">
                                @if($team->facebook)
                                    <a href="{{ $team->facebook }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                @endif
                                @if($team->instagram)
                                    <a href="{{ $team->instagram }}" target="_blank" class="btn btn-sm btn-outline-danger">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                @endif
                            </div>
                            <div class="team-actions">
                                <button class="btn-action btn-edit" data-bs-toggle="modal" data-bs-target="#editModal{{ $team->id }}" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-action btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $team->id }}" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- DELETE MODAL -->
                    <div class="modal fade" id="deleteModal{{ $team->id }}" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Confirm Delete</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body text-center py-4">
                                    <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
                                    <h6>Are you sure you want to delete {{ $team->name }}?</h6>
                                    <p class="text-muted small">This action cannot be undone.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <a href="{{ route('deleterecord', $team->id) }}" class="btn btn-danger">
                                        <i class="fas fa-trash me-2"></i>Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- EDIT MODAL -->
                    <div class="modal fade" id="editModal{{ $team->id }}" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Team Member</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('editrecord', $team->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="name{{ $team->id }}" class="form-label">Full Name</label>
                                                <input type="text" class="form-control" id="name{{ $team->id }}" name="name" value="{{ $team->name }}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="position{{ $team->id }}" class="form-label">Position</label>
                                                <input type="text" class="form-control" id="position{{ $team->id }}" name="pos" value="{{ $team->position }}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="phone{{ $team->id }}" class="form-label">Phone</label>
                                                <input type="text" class="form-control" id="phone{{ $team->id }}" name="phn" value="{{ $team->phone }}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="address{{ $team->id }}" class="form-label">Address</label>
                                                <input type="text" class="form-control" id="address{{ $team->id }}" name="add" value="{{ $team->address }}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="facebook{{ $team->id }}" class="form-label">Facebook URL</label>
                                                <input type="url" class="form-control" id="facebook{{ $team->id }}" name="fb" value="{{ $team->facebook }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="instagram{{ $team->id }}" class="form-label">Instagram URL</label>
                                                <input type="url" class="form-control" id="instagram{{ $team->id }}" name="insta" value="{{ $team->instagram }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="team{{ $team->id }}" class="form-label">Team</label>
                                                <select name="team" id="team{{ $team->id }}" class="form-select" required>
                                                    <option value="0" {{ $team->team_id == 0 ? 'selected' : '' }}>Daniras</option>
                                                    <option value="1" {{ $team->team_id == 1 ? 'selected' : '' }}>Brand Bird</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="photo{{ $team->id }}" class="form-label">Photo</label>
                                                <input type="file" class="form-control" id="photo{{ $team->id }}" name="pic" accept="image/*">
                                                <small class="text-muted">Leave empty to keep current photo</small>
                                            </div>
                                        </div>
                                        <div class="text-end mt-4">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save me-2"></i>Save Changes
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="no-content">
                            <i class="fas fa-users-slash"></i>
                            <h4>No Team Members Yet</h4>
                            <p>Click the "Add Team Member" button to get started</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ADD MODAL -->
    <div class="modal fade" id="addModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Team Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('addrecord') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')<div class="text-danger small">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label for="position" class="form-label">Position</label>
                                <input type="text" class="form-control" id="position" name="position" value="{{ old('position') }}" required>
                                @error('position')<div class="text-danger small">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                                @error('phone')<div class="text-danger small">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
                                @error('address')<div class="text-danger small">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label for="facebook" class="form-label">Facebook URL</label>
                                <input type="url" class="form-control" id="facebook" name="facebook" value="{{ old('facebook') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="instagram" class="form-label">Instagram URL</label>
                                <input type="url" class="form-control" id="instagram" name="instagram" value="{{ old('instagram') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="team" class="form-label">Team</label>
                                <select name="team" id="team" class="form-select" required>
                                    <option value="" selected disabled>Select Team</option>
                                    <option value="0">Daniras</option>
                                    <option value="1">Brand Bird</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="photo" class="form-label">Photo</label>
                                <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required>
                                @error('photo')<div class="text-danger small">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="text-end mt-4">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>Add Member
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- BOOTSTRAP 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
