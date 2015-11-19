<nav class="navbar navbar-default navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="/">
            <div class="navbar-brand" <?php /*href="{{ route('home') }}" */ ?>>
                Game Community
            </div>
        </a>
    </div>

    <div id="navbar" class="navbar-collapse collapse">

        <ul class="nav navbar-nav">

        </ul>

        <ul class="nav navbar-nav navbar-right">
            @if($user = Auth::user())
                @if($user->is_admin)
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                            admin
                            <b class="caret"></b> </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">
                                    <i class="fa fa-user "></i> Producte
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-power-off "></i> Categorien
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                            <img height="40" width="40" src="{{$user->avatar}}" alt="">
                            {{$user->username}}
                            <b class="caret"></b> </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">
                                    <i class="fa fa-user "></i> Einstellungen
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-user "></i> Wunschliste
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{route('auth::logout')}}">
                                    <i class="fa fa-power-off "></i> Logout
                                </a>
                            </li>
                        </ul>
                    </li>

            @else
                {{--<li><a href="{{route('facebook.redirect')}}">Log In mit Facebook</a></li>--}}
                <li><a href="{{route('guest::login')}}">Log In</a></li>
            @endif
        </ul>

    </div>
</nav>
