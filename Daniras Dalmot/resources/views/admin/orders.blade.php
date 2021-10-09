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
                    @forelse($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td class="d-flex justify-content-center align-items-center">
                            <label class="form-check-label" for="check1">
                                @if($order->status==1)
                                <a href={{route("orderstatus",$order->id)}}>
                                    <input type="checkbox" class="form-check-input" id="check1" name="status" value="{{$order->status}}" checked>
                                </a>
                                @else
                                <a href={{route("orderstatus",$order->id)}}>
                                    <input type="checkbox" class="form-check-input" id="check1" name="status" value="{{$order->status}}" >
                                </a>
                                @endif
                            </label>
                        </td>
                        <td>{{$order->productname}}</td>
                        <td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->quantity*$order->price}}</td>
                    </tr>
                    @empty
                    <tr><td colspan="10">Orders Empty</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
