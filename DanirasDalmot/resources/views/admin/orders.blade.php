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
            <div class="table-responsive">
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
                                <label class="form-check-label" for="{{$order->id}}">
                                    <input type="checkbox" id="{{$order->id}}" name="stat" order_id="{{$order->id}}" value="{{$order->status}}" class="form-check-input" @if ($order->status) checked @endif  />
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
                        <tr align="center"><td colspan="20">Orders Empty</td></tr>
                    @endforelse
                    <tr><td>{{$orders->links()}}</td></tr>
                </tbody>
            </table>
</div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script>
    $("input[name='stat']").change(function(){
        var display = $(this).attr('value');
        var orderId = $(this).attr("order_id");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: "{{route('updateOrder')}}",
            data: { "_token": "{{ csrf_token() }}",display:display, orderId:orderId},
            success: function(resp){
            },
            error: function(){
                alert("Error");
            }
        });
    });
</script>

@endsection
