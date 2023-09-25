<!-- navbar start -->
<div class="navbar-area">
    <!-- navbar top start -->
    <nav class="navbar navbar-area-1 navbar-area navbar-expand-lg">
        <div class="container nav-container">
            <div class="responsive-mobile-menu">
                <button class="menu toggle-btn d-block d-lg-none" data-target="#edumint_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-left"></span>
                    <span class="icon-right"></span>
                </button>
            </div>
            <div class="logo">
                <a href="/"><img src="{{ asset('front/img/logo-2.png') }}" alt="img"></a>
            </div>
            <div class="nav-left-part nav-right-part-desktop">

            </div>

            <div class="collapse navbar-collapse" id="edumint_main_menu">
                <ul class="navbar-nav menu-open">
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li>
                        <a href="/courses">Courses</a>
                    </li>
                    <li>
                        <a href="/about-us">About Us</a>
                    </li>
                    <li>
                        <a href="/gallery">Gallery</a>
                    </li>
                   

                    <ul class="mobile-btn float-right">
                        <li>
                            <a class="loginlink" href="{{ route('login') }}" >Login</a>
                        </li>
                        <li>
                            <a class="registerlink" href="{{ route('register') }}" style="padding: 7px 30px; background: var(--main-color); border-radius:25px;">Register</a>
                        </li>
                    </ul>
                </ul>
            </div>
        </div>
    </nav>
</div>

<!-- navbar end -->