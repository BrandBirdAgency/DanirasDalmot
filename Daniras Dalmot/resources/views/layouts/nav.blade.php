<!-- HEADER -->
<header>
    <a class="logo" href="/"><img src="./assets/images/logo.jpg" alt="logo" /></a>
    <nav>
        <ul class="nav__links">
            <li><a href="{{route('homepage')}}">Home</a></li>
            <li><a href="{{route('productpage')}}">Products</a></li>
            <li><a href="{{route('teampage')}}">Team</a></li>
            <li><a href="{{route('aboutpage')}}">About</a></li>
        </ul>
    </nav>
    <a class="cta" href="{{route('contactpage')}}">Contact</a>
    <p class="menu cta">Menu</p>
</header>
<div id="mobile__menu" class="overlay">
    <a class="close">&times;</a>
    <div class="overlay__content">
        <a href="{{route('homepage')}}">Home</a>
        <a href="{{route('productpage')}}">Products</a>
        <a href="{{route('teampage')}}">Team</a>
        <a href="{{route('aboutpage')}}">About</a>
        <a href="{{route('contactpage')}}">Contact</a>
    </div>
</div>
<!-- END HEADER -->

<!-- MAIN BANNER -->
<div class="teambanner">
    <div class="contain">
        <div class="image">
            <img src="./assets/images/bg.jpg" alt="" />
        </div>
        <div class="image-overlay"></div>
        <div class="text">
            <div class="headings">
                <h1 class="">CONTACT</h1>
                <div class="bannerline"></div>
            </div>
            <div class="bannernav">
                <li><i class="fas fa-home"></i></li>
                <li><a href="{{route('homepage')}}">HOME</a></li>
                <li><i class="fas fa-caret-right"></i></li>
                <li><a href="{{route('aboutpage')}}">CONTACT</a></li>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN BANNER -->