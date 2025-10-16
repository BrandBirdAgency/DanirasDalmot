<!-- FOOTER -->

@php
$about = App\Models\About::first();
@endphp

<div class="footer-basic">
    <footer>
        <div class="social">
            <a href="{{$about->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="{{$about->instagram}}" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="{{$about->twitter}}" target="_blank"><i class="fab fa-twitter"></i></a>
        </div>

        <ul class="list-inline">
            <li class="list-inline-item"><a href="{{ route('homepage') }}">Home</a></li>
            <li class="list-inline-item"><a href="{{ route('productpage') }}">Products</a></li>
            <li class="list-inline-item"><a href="{{ route('teampage') }}">Team</a></li>
            <li class="list-inline-item"><a href="{{ route('aboutpage') }}">About</a></li>
            <li class="list-inline-item"><a href="{{ route('contactpage') }}">Contact</a></li>
        </ul>

        <p class="copyright">{{$about->name}} © {{ date('Y') }}</p>
        <div class="text-center dcma mt-3">
            <a href="//www.dmca.com/Protection/Status.aspx?ID=eed91a69-b75a-44ae-b6ae-e19ee3144ce5"
                title="DMCA.com Protection Status" class="dmca-badge"> <img
                    src="https://images.dmca.com/Badges/dmca_protected_sml_120m.png?ID=eed91a69-b75a-44ae-b6ae-e19ee3144ce5"
                    alt="DMCA.com Protection Status" /></a>
            <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
        </div>
        <div class="ourcompany">
            <p class="mb-0">DEVELOPED BY <a href="https://brandbirdagency.com" target="_blank" rel="noopener">Brand
                    Bird</a></p>
        </div>
    </footer>
</div>
<div id="fb-root"></div>
<div id="fb-customer-chat" class="fb-customerchat">
</div>
<script>
    var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "1015463985278748");
      chatbox.setAttribute("attribution", "biz_inbox");

      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v12.0'
        });
      };
      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
</script>

<!-- FOOTER END -->