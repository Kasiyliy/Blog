<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
<aside id="colorlib-aside" role="complementary" class="js-fullheight">
    <nav id="colorlib-main-menu" role="navigation">
        <ul>
            <li @if(Route::currentRouteName() == 'index') class="colorlib-active" @endif><a href="{{route('index')}}">Home</a>
            </li>
            @guest
                <li><a href="{{route('login')}}">Login</a></li>
                <li><a href="{{route('register')}}">Register</a></li>
            @endguest

            @auth
                <li><a href="{{route('home')}}">Profile</a></li>
            @endauth
        </ul>
    </nav>
</aside> <!-- END COLORLIB-ASIDE -->
