<!-- FOOTER -->

@php
    $about = App\Models\About::first();
@endphp

<div class="footer-basic">
    <footer>
        <div class="social">
            <a href="{{$about->facebook}}"><i class="icon ion-social-facebook"></i></a>
            <a href="{{$about->instagram}}"><i class="icon ion-social-instagram"></i></a>
            <a href="{{$about->twitter}}"><i class="icon ion-social-twitter"></i></a>
        </div>

        <ul class="list-inline">
            <li class="list-inline-item"><a href="{{ route('homepage') }}">Home</a></li>
            <li class="list-inline-item"><a href="{{ route('productpage') }}">Products</a></li>
            <li class="list-inline-item"><a href="{{ route('teampage') }}">Team</a></li>
            <li class="list-inline-item"><a href="{{ route('aboutpage') }}">About</a></li>
            <li class="list-inline-item"><a href="{{ route('contactpage') }}">Contact</a></li>
        </ul>

        <p class="copyright">{{$about->name}} © {{ date('Y') }}</p>
        <div class="ourcompany">
            <p class="mb-0">POWERED BY <a href="https://101infotech.com.np/" >101INFOTECH</a></p>
        </div>
    </footer>
</div>

<!-- FOOTER END -->
