@extends('layouts.app')
@section('title', 'Admin Dashboard')
@section('css')
<!-- BOOTSTRAP 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- FONTAWESOME 6 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

<!-- CHART.JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

<link rel="stylesheet" href="{{ asset('/assets/css/admin.css') }}" />

<style>
    :root {
        --primary-color: #e63946;
        --secondary-color: #f1faee;
        --dark-color: #1d3557;
        --light-color: #a8dadc;
        --success-color: #06d6a0;
        --warning-color: #ffd166;
        --danger-color: #ef476f;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        background: #f8f9fa;
    }

    .dashboard-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, #d62828 100%);
        color: white;
        padding: 2rem 0;
        margin-bottom: 2rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .stat-card {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-left: 4px solid;
        height: 100%;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.12);
    }

    .stat-card.revenue {
        border-left-color: var(--success-color);
    }

    .stat-card.orders {
        border-left-color: var(--primary-color);
    }

    .stat-card.customers {
        border-left-color: var(--warning-color);
    }

    .stat-card.products {
        border-left-color: #457b9d;
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        margin-bottom: 1rem;
    }

    .stat-card.revenue .stat-icon {
        background: rgba(6, 214, 160, 0.1);
        color: var(--success-color);
    }

    .stat-card.orders .stat-icon {
        background: rgba(230, 57, 70, 0.1);
        color: var(--primary-color);
    }

    .stat-card.customers .stat-icon {
        background: rgba(255, 209, 102, 0.1);
        color: var(--warning-color);
    }

    .stat-card.products .stat-icon {
        background: rgba(69, 123, 157, 0.1);
        color: #457b9d;
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 700;
        margin: 0.5rem 0;
        color: var(--dark-color);
    }

    .stat-label {
        color: #6c757d;
        font-size: 0.9rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .stat-change {
        font-size: 0.85rem;
        font-weight: 600;
        margin-top: 0.5rem;
    }

    .stat-change.positive {
        color: var(--success-color);
    }

    .stat-change.negative {
        color: var(--danger-color);
    }

    .chart-card {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        margin-bottom: 1.5rem;
    }

    .admin-menu-card {
        background: white;
        border-radius: 12px;
        padding: 2rem 1.5rem;
        text-align: center;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        height: 100%;
        cursor: pointer;
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .admin-menu-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        text-decoration: none;
        color: inherit;
    }

    .admin-menu-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 1rem;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        background: linear-gradient(135deg, var(--primary-color), #d62828);
        color: white;
    }

    .future-plans-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 16px;
        padding: 3rem 2rem;
        margin: 2rem 0;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
    }

    .feature-card {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        border-radius: 12px;
        padding: 2rem;
        margin-bottom: 1.5rem;
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
    }

    .feature-card:hover {
        background: rgba(255, 255, 255, 0.25);
        transform: translateX(10px);
    }

    .feature-icon {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }

    .badge-new {
        background: #06d6a0;
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        margin-left: 0.5rem;
    }

    .table-card {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        margin-bottom: 1.5rem;
    }

    .table thead th {
        border-bottom: 2px solid var(--primary-color);
        color: var(--dark-color);
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
    }
</style>
@endsection

@section('content')

<!-- DASHBOARD HEADER -->
<div class="dashboard-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="mb-2"><i class="fas fa-tachometer-alt"></i> Admin Dashboard</h1>
                <p class="mb-0 opacity-75">Welcome back! Here's what's happening with your store today.</p>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <div class="text-white">
                    <i class="far fa-calendar-alt"></i> {{ date('F d, Y') }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MAIN CONTENT -->
<section id="admin-dashboard" class="py-4">
    <div class="container">

        <!-- ANALYTICS STATS -->
        <div class="row g-4 mb-4">
            <div class="col-lg-3 col-md-6">
                <div class="stat-card revenue">
                    <div class="stat-icon">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="stat-label">Total Revenue</div>
                    <div class="stat-number">NPR {{ number_format($totalRevenue, 0) }}</div>
                    <div class="stat-change {{ $revenueGrowth >= 0 ? 'positive' : 'negative' }}">
                        <i class="fas fa-arrow-{{ $revenueGrowth >= 0 ? 'up' : 'down' }}"></i>
                        {{ number_format(abs($revenueGrowth), 1) }}% from last month
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="stat-card orders">
                    <div class="stat-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="stat-label">Total Orders</div>
                    <div class="stat-number">{{ number_format($totalOrders) }}</div>
                    <div class="stat-change {{ $ordersGrowth >= 0 ? 'positive' : 'negative' }}">
                        <i class="fas fa-arrow-{{ $ordersGrowth >= 0 ? 'up' : 'down' }}"></i>
                        {{ number_format(abs($ordersGrowth), 1) }}% from last month
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="stat-card customers">
                    <div class="stat-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-label">Pending Orders</div>
                    <div class="stat-number">{{ number_format($pendingOrders + $processingOrders) }}</div>
                    <div class="stat-change">
                        <span class="text-warning">{{ $pendingOrders }} pending, {{ $processingOrders }}
                            processing</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="stat-card products">
                    <div class="stat-icon">
                        <i class="fas fa-box"></i>
                    </div>
                    <div class="stat-label">Total Products</div>
                    <div class="stat-number">{{ number_format($totalProducts) }}</div>
                    <div class="stat-change positive">
                        <i class="fas fa-check-circle"></i> {{ $deliveredOrders }} delivered orders
                    </div>
                </div>
            </div>
        </div>

        <!-- CHARTS ROW -->
        <div class="row g-4 mb-4">
            <div class="col-lg-8">
                <div class="chart-card">
                    <h5 class="mb-3"><i class="fas fa-chart-line"></i> Sales Overview (Last 10 Months)</h5>
                    <canvas id="salesChart" height="80"></canvas>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="chart-card">
                    <h5 class="mb-3"><i class="fas fa-chart-pie"></i> Product Categories</h5>
                    <canvas id="categoryChart"></canvas>
                </div>
            </div>
        </div>

        <!-- QUICK ACTIONS -->
        <div class="row mb-4">
            <div class="col-12">
                <h4 class="mb-3"><i class="fas fa-bolt"></i> Quick Actions</h4>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('orders') }}" class="admin-menu-card">
                    <div class="admin-menu-icon">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <h5 class="mb-2">Manage Orders</h5>
                    <p class="text-muted small mb-0">View and process customer orders</p>
                </a>
            </div>

            <div class="col-lg-3 col-md-6">
                <a href="{{ route('teams') }}" class="admin-menu-card">
                    <div class="admin-menu-icon" style="background: linear-gradient(135deg, #667eea, #764ba2);">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <h5 class="mb-2">Manage Team</h5>
                    <p class="text-muted small mb-0">Add or edit team members</p>
                </a>
            </div>

            <div class="col-lg-3 col-md-6">
                <a href="{{ route('product.index') }}" class="admin-menu-card">
                    <div class="admin-menu-icon" style="background: linear-gradient(135deg, #f093fb, #f5576c);">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <h5 class="mb-2">Manage Products</h5>
                    <p class="text-muted small mb-0">Add, edit, or delete products</p>
                </a>
            </div>

            <div class="col-lg-3 col-md-6">
                <a href="{{ route('profile') }}" class="admin-menu-card">
                    <div class="admin-menu-icon" style="background: linear-gradient(135deg, #4facfe, #00f2fe);">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <h5 class="mb-2">Profile Settings</h5>
                    <p class="text-muted small mb-0">Manage company information</p>
                </a>
            </div>
        </div>

        <!-- RECENT ORDERS TABLE -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="table-card">
                    <h5 class="mb-3"><i class="fas fa-history"></i> Recent Orders</h5>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentOrders as $order)
                                <tr>
                                    <td><strong>#ORD-{{ $order->id }}</strong></td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->product ? $order->product->name : 'N/A' }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>NPR {{ number_format($order->total_price, 2) }}</td>
                                    <td>
                                        @if($order->status == 'delivered')
                                        <span class="badge bg-success">Delivered</span>
                                        @elseif($order->status == 'processing')
                                        <span class="badge bg-warning text-dark">Processing</span>
                                        @elseif($order->status == 'shipped')
                                        <span class="badge bg-info">Shipped</span>
                                        @elseif($order->status == 'cancelled')
                                        <span class="badge bg-danger">Cancelled</span>
                                        @else
                                        <span class="badge bg-secondary">{{ ucfirst($order->status) }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $order->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <a href="{{ route('orders') }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">
                                        <i class="fas fa-inbox fa-2x mb-2"></i>
                                        <p class="mb-0">No orders found</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="text-end mt-3">
                        <a href="{{ route('orders') }}" class="btn btn-outline-primary">
                            View All Orders <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- FUTURE PLANS SECTION -->
        <div class="future-plans-section">
            <div class="row">
                <div class="col-12 text-center mb-4">
                    <h2 class="mb-3">
                        <i class="fas fa-rocket"></i> Future Plans & Expansion Opportunities
                    </h2>
                    <p class="lead opacity-90">
                        Take your business to the next level with these powerful features and integrations
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-store"></i>
                        </div>
                        <h5 class="mb-2">
                            Vendor Management System
                            <span class="badge-new">HIGH ROI</span>
                        </h5>
                        <p class="mb-3 opacity-90">
                            Manage multiple suppliers, track inventory from different vendors, automated purchase
                            orders, and vendor performance analytics.
                        </p>
                        <ul class="list-unstyled small opacity-75">
                            <li><i class="fas fa-check me-2"></i>Supplier database & ratings</li>
                            <li><i class="fas fa-check me-2"></i>Automated procurement</li>
                            <li><i class="fas fa-check me-2"></i>Cost optimization tools</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-users-cog"></i>
                        </div>
                        <h5 class="mb-2">
                            CRM System
                            <span class="badge-new">RECOMMENDED</span>
                        </h5>
                        <p class="mb-3 opacity-90">
                            Customer Relationship Management to track customer interactions, preferences, purchase
                            history, and targeted marketing campaigns.
                        </p>
                        <ul class="list-unstyled small opacity-75">
                            <li><i class="fas fa-check me-2"></i>Customer profiles & segmentation</li>
                            <li><i class="fas fa-check me-2"></i>Email marketing automation</li>
                            <li><i class="fas fa-check me-2"></i>Loyalty program management</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-cash-register"></i>
                        </div>
                        <h5 class="mb-2">
                            Point of Sale (POS) System
                            <span class="badge-new">TRENDING</span>
                        </h5>
                        <p class="mb-3 opacity-90">
                            Integrated POS for retail locations, real-time inventory sync, payment processing, and
                            offline capability.
                        </p>
                        <ul class="list-unstyled small opacity-75">
                            <li><i class="fas fa-check me-2"></i>Multi-location support</li>
                            <li><i class="fas fa-check me-2"></i>Real-time inventory sync</li>
                            <li><i class="fas fa-check me-2"></i>Digital receipt & invoicing</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-warehouse"></i>
                        </div>
                        <h5 class="mb-2">Advanced Inventory Management</h5>
                        <p class="mb-3 opacity-90">
                            Smart inventory tracking with low-stock alerts, batch tracking, expiry management, and
                            predictive restocking.
                        </p>
                        <ul class="list-unstyled small opacity-75">
                            <li><i class="fas fa-check me-2"></i>Barcode/QR scanning</li>
                            <li><i class="fas fa-check me-2"></i>Automated reorder points</li>
                            <li><i class="fas fa-check me-2"></i>Warehouse optimization</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h5 class="mb-2">Mobile App Development</h5>
                        <p class="mb-3 opacity-90">
                            Native iOS and Android apps for customers with push notifications, mobile payments, and
                            seamless ordering experience.
                        </p>
                        <ul class="list-unstyled small opacity-75">
                            <li><i class="fas fa-check me-2"></i>Easy mobile ordering</li>
                            <li><i class="fas fa-check me-2"></i>Push notifications</li>
                            <li><i class="fas fa-check me-2"></i>In-app customer support</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-robot"></i>
                        </div>
                        <h5 class="mb-2">AI-Powered Analytics</h5>
                        <p class="mb-3 opacity-90">
                            Machine learning for sales forecasting, customer behavior analysis, dynamic pricing, and
                            business intelligence.
                        </p>
                        <ul class="list-unstyled small opacity-75">
                            <li><i class="fas fa-check me-2"></i>Sales prediction models</li>
                            <li><i class="fas fa-check me-2"></i>Customer churn analysis</li>
                            <li><i class="fas fa-check me-2"></i>Automated insights & reports</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <h5 class="mb-2">Delivery Management System</h5>
                        <p class="mb-3 opacity-90">
                            Route optimization, real-time tracking, delivery partner management, and automated dispatch
                            system.
                        </p>
                        <ul class="list-unstyled small opacity-75">
                            <li><i class="fas fa-check me-2"></i>GPS tracking & routing</li>
                            <li><i class="fas fa-check me-2"></i>Delivery partner app</li>
                            <li><i class="fas fa-check me-2"></i>Proof of delivery</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-comments"></i>
                        </div>
                        <h5 class="mb-2">Live Chat & Support System</h5>
                        <p class="mb-3 opacity-90">
                            24/7 customer support with AI chatbot, ticket management, and multi-channel communication
                            (WhatsApp, Facebook, etc.).
                        </p>
                        <ul class="list-unstyled small opacity-75">
                            <li><i class="fas fa-check me-2"></i>AI-powered chatbot</li>
                            <li><i class="fas fa-check me-2"></i>WhatsApp integration</li>
                            <li><i class="fas fa-check me-2"></i>Support ticket system</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                        <h5 class="mb-2">Financial Management Module</h5>
                        <p class="mb-3 opacity-90">
                            Comprehensive accounting, expense tracking, profit/loss reports, tax management, and
                            financial forecasting.
                        </p>
                        <ul class="list-unstyled small opacity-75">
                            <li><i class="fas fa-check me-2"></i>Automated invoicing</li>
                            <li><i class="fas fa-check me-2"></i>Expense categorization</li>
                            <li><i class="fas fa-check me-2"></i>Financial dashboards</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 text-center">
                    <h5 class="mb-3">Ready to transform your business?</h5>
                    <p class="mb-4 opacity-90">
                        Contact us to discuss which features would benefit your business the most and get a customized
                        implementation plan.
                    </p>
                    <a href="{{ route('contactpage') }}" class="btn btn-light btn-lg px-5 py-3">
                        <i class="fas fa-paper-plane me-2"></i> Get Started Today
                    </a>
                    <a href="mailto:info@danirasdalmot.com" class="btn btn-outline-light btn-lg px-5 py-3 ms-3">
                        <i class="fas fa-phone me-2"></i> Schedule a Demo
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection

@section('js')
<!-- BOOTSTRAP 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Sales Chart
      const salesCtx = document.getElementById('salesChart').getContext('2d');
      const monthlySalesData = @json($monthlySales);
      
      new Chart(salesCtx, {
        type: 'line',
        data: {
          labels: monthlySalesData.map(item => item.month),
          datasets: [{
            label: 'Sales (NPR)',
            data: monthlySalesData.map(item => item.sales),
            borderColor: '#e63946',
            backgroundColor: 'rgba(230, 57, 70, 0.1)',
            tension: 0.4,
            fill: true,
            pointBackgroundColor: '#e63946',
            pointBorderColor: '#fff',
            pointBorderWidth: 2,
            pointRadius: 5,
            pointHoverRadius: 7
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: true,
          plugins: {
            legend: {
              display: true,
              position: 'top'
            },
            tooltip: {
              backgroundColor: 'rgba(0, 0, 0, 0.8)',
              padding: 12,
              titleFont: {
                size: 14
              },
              bodyFont: {
                size: 13
              },
              callbacks: {
                label: function(context) {
                  return 'Revenue: NPR ' + context.parsed.y.toLocaleString();
                }
              }
            }
          },
          scales: {
            y: {
              beginAtZero: true,
              ticks: {
                callback: function(value) {
                  return 'NPR ' + value.toLocaleString();
                }
              },
              grid: {
                color: 'rgba(0, 0, 0, 0.05)'
              }
            },
            x: {
              grid: {
                display: false
              }
            }
          }
        }
      });

      // Category Chart
      const categoryCtx = document.getElementById('categoryChart').getContext('2d');
      const categoryData = @json($productCategories);
      
      new Chart(categoryCtx, {
        type: 'doughnut',
        data: {
          labels: categoryData.map(item => item.category || 'Uncategorized'),
          datasets: [{
            data: categoryData.map(item => item.count),
            backgroundColor: [
              '#e63946',
              '#f1faee',
              '#a8dadc',
              '#457b9d',
              '#1d3557',
              '#06d6a0',
              '#ffd166'
            ],
            borderWidth: 2,
            borderColor: '#fff'
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: true,
          plugins: {
            legend: {
              position: 'bottom',
              labels: {
                padding: 15,
                font: {
                  size: 12
                }
              }
            },
            tooltip: {
              backgroundColor: 'rgba(0, 0, 0, 0.8)',
              padding: 12,
              callbacks: {
                label: function(context) {
                  const total = context.dataset.data.reduce((a, b) => a + b, 0);
                  const percentage = ((context.parsed / total) * 100).toFixed(1);
                  return context.label + ': ' + context.parsed + ' (' + percentage + '%)';
                }
              }
            }
          }
        }
      });
</script>
@endsection