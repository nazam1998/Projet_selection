<nav class="navbar">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="img/navIconWhite.png" data-active-url="img/navIconWhite.png"
                    alt=""></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right main-nav">
                <li><a href="{{route('welcome').'#intro'}}">Intro</a></li>
                <li><a href="{{route('welcome').'#services'}}">Services</a></li>
                <li><a href="{{route('welcome').'#team'}}">Team</a></li>
                <li><a href="{{route('welcome').'#formulaire'}}">Inscription</a></li>
                <li><a href="{{route('welcome').'#contact'}}">Contact</a></li>
                @can('backoffice')
                <li><a href="{{route('home')}}">Backoffice</a></li>
                @endcan
                @guest
                <li><a href="{{route('login')}}">Sign in</a></li>
                @else
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
				document.getElementById('logout-form').submit();">{{ __('Sign out') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endguest
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
