<!-- FOOTER -->

@php
$about = App\Models\About::first();
@endphp

<div class="footer-basic">
    <footer>
        <div class="social">
            <a href="{{$about->facebook}}"><i class="fab fa-facebook-f"></i></a>
            <a href="{{$about->instagram}}"><i class="fab fa-instagram"></i></a>
            <a href="{{$about->twitter}}"><i class="fab fa-twitter"></i></a>
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
            <p class="mb-0">POWERED BY <a href="https://101infotech.com.np/">101INFOTECH</a></p>
        </div>
        <div class="text-center dcma mt-3">
            <a href="//www.dmca.com/Protection/Status.aspx?ID=eed91a69-b75a-44ae-b6ae-e19ee3144ce5"
                title="DMCA.com Protection Status" class="dmca-badge"> <img
                    src="https://images.dmca.com/Badges/dmca_protected_sml_120m.png?ID=eed91a69-b75a-44ae-b6ae-e19ee3144ce5"
                    alt="DMCA.com Protection Status" /></a>
            <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
        </div>
    </footer>
</div>

<!-- FOOTER END -->