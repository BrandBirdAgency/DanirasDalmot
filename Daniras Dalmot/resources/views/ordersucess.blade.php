@extends('layouts.app')
@section('title','Order Sucessfull')
@section('content')
<section id="online-payment">
  <div class="payementsuccess col-12">
        <div class="payicon">
            <h1>Thank You !</h1>
            <div class="image">
                <img src="./assets/images/paymentsucess.png" alt="">
            </div>
        </div>
        <h2 class="text-center">Your Order is Successful</h2>
        <p>
            Thank you for your order. You will soon get an email from us.
        </p>
    </div>

</section>
@endsection
@section('js')
  <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
@endsection
