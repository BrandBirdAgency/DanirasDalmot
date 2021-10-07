@extends('layouts.app')
@section('title','Dashboard')
@section('css')
<link rel="stylesheet" href="./assets/css/admin.css" />
@endsection
@section('content')
    <section id="admin-dashboard">
        <div class="container">
            <div class="row justify-content-center">
                <h3 class="mb-5">Admin Dashboard</h3>
            </div>
            <div class="row">
                <div class="col-md-3 col-12 col-sm-6 d-flex justify-content-center justify-content-sm-start mb-4">
                    <div class="admin-box">
                        <img src="./assets/images/order.png" alt="">
                        <p>Orders </p>
                    </div>
                </div>
                <div class="col-md-3 col-12 col-sm-6 d-flex justify-content-center justify-content-sm-start mb-4">
                    <div class="admin-box">
                        <img src="./assets/images/team.png" alt="">
                        <p>Teams </p>
                    </div>
                </div>
                <div class="col-md-3 col-12 col-sm-6 d-flex justify-content-center justify-content-sm-start mb-4">
                    <div class="admin-box">
                        <img src="./assets/images/box.png" alt="">
                        <p>Products </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
{{-- @section('js')
<script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
@endsection --}}
