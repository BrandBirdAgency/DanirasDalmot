@extends('layouts.app')
@section('title', 'Orders Management')
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
            --warning-color: #ffd166;
            --danger-color: #ef476f;
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
        
        .stats-row {
            margin-bottom: 2rem;
        }
        
        .stat-box {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            border-left: 4px solid;
            transition: transform 0.3s ease;
        }
        
        .stat-box:hover {
            transform: translateY(-5px);
        }
        
        .stat-box.total { border-left-color: var(--primary-color); }
        .stat-box.pending { border-left-color: var(--warning-color); }
        .stat-box.completed { border-left-color: var(--success-color); }
        .stat-box.cancelled { border-left-color: var(--danger-color); }
        
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
        
        .table-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        
        .table thead th {
            border-bottom: 2px solid var(--primary-color);
            color: var(--dark-color);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            white-space: nowrap;
        }
        
        .table tbody tr {
            transition: background-color 0.2s ease;
        }
        
        .table tbody tr:hover {
            background-color: rgba(230, 57, 70, 0.05);
        }
        
        .status-switch {
            transform: scale(1.2);
        }
        
        .back-btn .btn {
            background: white;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            font-weight: 600;
            padding: 0.5rem 1.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .back-btn .btn:hover {
            background: var(--primary-color);
            color: white;
        }
        
        .badge-status {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
    </style>
@endsection

@section('content')
    <!-- PAGE HEADER -->
    <div class="page-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="mb-2"><i class="fas fa-shopping-cart"></i> Orders Management</h1>
                    <p class="mb-0 opacity-75">View and manage all customer orders</p>
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
    <section id="orders" class="py-4">
        <div class="container">
            
            <!-- STATISTICS -->
            <div class="stats-row">
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-box total">
                            <div class="stat-label">Total Orders</div>
                            <div class="stat-number">{{ $orders->total() }}</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-box pending">
                            <div class="stat-label">Pending</div>
                            <div class="stat-number">{{ $orders->where('status', 0)->count() }}</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-box completed">
                            <div class="stat-label">Completed</div>
                            <div class="stat-number">{{ $orders->where('status', 1)->count() }}</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-box total">
                            <div class="stat-label">Total Revenue</div>
                            <div class="stat-number">NPR {{ number_format($orders->sum('price')) }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ORDERS TABLE -->
            <div class="table-card">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0"><i class="fas fa-list"></i> All Orders</h5>
                    <div class="text-muted small">
                        Showing {{ $orders->firstItem() }} to {{ $orders->lastItem() }} of {{ $orders->total() }} orders
                    </div>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>#Order</th>
                                <th>Status</th>
                                <th>Product</th>
                                <th>Customer</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $order)
                                <tr>
                                    <td><strong>#{{ $order->id }}</strong></td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input status-switch" 
                                                   type="checkbox" 
                                                   id="status{{ $order->id }}" 
                                                   name="stat"
                                                   order_id="{{ $order->id }}" 
                                                   value="{{ $order->status }}"
                                                   @if ($order->status) checked @endif>
                                            <label class="form-check-label small" for="status{{ $order->id }}">
                                                @if($order->status)
                                                    <span class="text-success fw-bold">Completed</span>
                                                @else
                                                    <span class="text-warning fw-bold">Pending</span>
                                                @endif
                                            </label>
                                        </div>
                                    </td>
                                    <td>{{ $order->productname }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td class="small">{{ $order->email }}</td>
                                    <td class="small">{{ Str::limit($order->address, 30) }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td><span class="badge bg-primary">{{ $order->quantity }}</span></td>
                                    <td>NPR {{ number_format($order->productprice, 2) }}</td>
                                    <td><strong>NPR {{ number_format($order->price, 2) }}</strong></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center py-5">
                                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                        <p class="text-muted">No orders found</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <!-- PAGINATION -->
                @if($orders->hasPages())
                    <div class="d-flex justify-content-center mt-4">
                        {{ $orders->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- BOOTSTRAP 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $("input[name='stat']").change(function() {
            var display = $(this).attr('value');
            var orderId = $(this).attr("order_id");
            var switchElement = $(this);
            var label = $(this).next('label').find('span');
            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: "{{ route('updateOrder') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    display: display,
                    orderId: orderId
                },
                success: function(resp) {
                    // Update the label text
                    if(switchElement.is(':checked')) {
                        label.removeClass('text-warning').addClass('text-success').text('Completed');
                    } else {
                        label.removeClass('text-success').addClass('text-warning').text('Pending');
                    }
                    
                    // Show success message
                    showToast('Order status updated successfully!', 'success');
                },
                error: function() {
                    alert("Error updating order status");
                    // Revert the switch
                    switchElement.prop('checked', !switchElement.is(':checked'));
                }
            });
        });
        
        function showToast(message, type) {
            // Simple toast notification
            var toast = $('<div class="position-fixed top-0 end-0 p-3" style="z-index: 9999;"><div class="toast show bg-' + type + ' text-white" role="alert"><div class="toast-body">' + message + '</div></div></div>');
            $('body').append(toast);
            setTimeout(function() {
                toast.fadeOut(function() {
                    toast.remove();
                });
            }, 3000);
        }
    </script>

@endsection
