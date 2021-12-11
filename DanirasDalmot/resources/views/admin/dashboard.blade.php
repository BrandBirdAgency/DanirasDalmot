@extends('layouts.app')
@section('title', 'Dashboard')
@section('css')
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{ asset('/assets/css/admin.css') }}" />
@endsection

@section('content')

    <section id="admin-dashboard">
        <div class="container">
            <div class="row justify-content-center">
                <h3 class="mb-5">Admin Dashboard</h3>
            </div>
            <div class="row">
                <div class="col-md-3 col-12 col-sm-6 d-flex justify-content-center justify-content-sm-start mb-4">
                    <a href={{ route('profile') }}>
                        <div class="admin-box">
                            <img src="{{ asset('/assets/images/team.png') }}" alt="profile">
                            <p>Profile </p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-12 col-sm-6 d-flex justify-content-center justify-content-sm-start mb-4">
                    <a href={{ route('orders') }}>
                        <div class="admin-box">
                            <img src="{{ asset('/assets/images/order.png') }}" alt="">
                            <p>Orders </p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-12 col-sm-6 d-flex justify-content-center justify-content-sm-start mb-4">
                    <a href={{ route('teams') }}>
                        <div class="admin-box">
                            <img src="{{ asset('/assets/images/team.png') }}" alt="">
                            <p>Teams </p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-12 col-sm-6 d-flex justify-content-center justify-content-sm-start mb-4">
                    <a href={{ route('product.index') }}>
                        <div class="admin-box">
                            <img src="{{ asset('/assets/images/box.png') }}" alt="">
                            <p>Products </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        </div>
        <!-- Product details ends  -->
    </section>

@endsection


@section('js')
    <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
@endsection
