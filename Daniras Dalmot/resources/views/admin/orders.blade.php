@extends('layouts.app')
@section('title','Orders')
@section('css')
    <!-- CSS -->
    <!-- Add icon library -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="{{asset('/assets/css/admin.css')}}"
    />
@endsection
@section('content')
<div class="back-btn">
  <a href="{{route('dashboard')}}" class="btn ml-4 mb-3">Back</a>
</div>
    <section id="orders">
        <div class="container">
            <div class="row justify-content-center">
                <h3 class="mb-4">Orders</h3>
            </div>
            <table class="table table-dark table-hover">
                <thead>
                  <tr>
                    <th>Order No</th>
                    <th>Order Status</th>
                    <th>Product</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>122</td>
                        <td class="d-flex justify-content-center align-items-center">
                            <label class="form-check-label" for="check1">
                                <input type="checkbox" class="form-check-input" id="check1" name="option1" value="something" checked>
                            </label>
                        </td>
                        <td>Dalmot1</td>
                        <td>Gautam Adhikari</td>
                        <td>something@gmail.com</td>
                        <td>Buspark</td>
                        <td>988888888</td>
                        <td>3</td>
                        <td>Rs.400</td>
                        <td>Rs.1200</td>
                    </tr>
                    <tr>
                        <td>122</td>
                        <td class="d-flex justify-content-center align-items-center">
                            <label class="form-check-label" for="check1">
                                <input type="checkbox" class="form-check-input" id="check1" name="option1" value="something" checked>
                            </label>
                        </td>
                        <td>Dalmot1</td>
                        <td>Gautam Adhikari</td>
                        <td>something@gmail.com</td>
                        <td>Buspark</td>
                        <td>988888888</td>
                        <td>3</td>
                        <td>Rs.400</td>
                        <td>Rs.1200</td>
                    </tr>
                    <tr>
                        <td>122</td>
                        <td class="d-flex justify-content-center align-items-center">
                            <label class="form-check-label" for="check1">
                                <input type="checkbox" class="form-check-input" id="check1" name="option1" value="something" checked>
                            </label>
                        </td>
                        <td>Dalmot1</td>
                        <td>Gautam Adhikari</td>
                        <td>something@gmail.com</td>
                        <td>Buspark</td>
                        <td>988888888</td>
                        <td>3</td>
                        <td>Rs.400</td>
                        <td>Rs.1200</td>
                    </tr>
                    <tr>
                        <td>122</td>
                        <td class="d-flex justify-content-center align-items-center">
                            <label class="form-check-label" for="check1">
                                <input type="checkbox" class="form-check-input" id="check1" name="option1" value="something" checked>
                            </label>
                        </td>
                        <td>Dalmot1</td>
                        <td>Gautam Adhikari</td>
                        <td>something@gmail.com</td>
                        <td>Buspark</td>
                        <td>988888888</td>
                        <td>3</td>
                        <td>Rs.400</td>
                        <td>Rs.1200</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
