<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <img src="{{ asset('img/logo.png') }}" alt="EUNCCU" border="0" height="50" width="35"/>
          <a class="navbar-brand" href="{{ url('welcome') }}">Portal</a>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="{{Request::is('welcome')? "active" :""}}"><a href="{{ url('welcome') }}">Home </a></li>
            <li class="{{Request::is('posts')? "active" :""}}"><a href="{{ url('posts') }}">Blog Posts </a></li>
            <li class="{{Request::is('bible-study')? "active" :""}}"><a href="{{ route('bibles.bs') }}">Bible Study </a></li>
          
            <li> <a href="http://www.eunccu.org" target="_blank">EUNCCU Website</a></li>
            <li class="{{Request::is('nominate-leader')? "active" :""}}"><a href="{{ route('nominations.index') }}">Leadership Nomination</a></li>


            <li class="{{Request::is('missions/create')? "active" :""}}"><a href="{{ route('missions.create') }}">Mission Application</a></li>
            <li class="{{Request::is('library')? "active" :""}}"><a href="{{ url('library') }}">EUNCCU Library</a></li>

          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li class="{{Request::is('contact')? "active" :""}}"><a href="{{ url('contact') }}">Contact Us</a></li>
            <li class="{{Request::is('manual')? "active" :""}}"><a href="{{ url('manual') }}">Help</a></li>






                            @if (Auth::guest())
                            <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                          <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        Login/Register <span class="caret"></span>
                                    </a>
                            <ul class="dropdown-menu" role="menu">
                                <li{{Request::is('login')? "active" :""}}><a href="{{ route('login') }}">Login</a></li>
                                <li {{Request::is('register')? "active" :""}}><a href="{{ route('register') }}">Register</a></li>
                              </ul>
                            </li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                      <li><a href="{{ url('profile') }}">Profile</a></li>

                                      <!-- Adminstrator Rights -->
                                      @if(auth()->user()->isAdmin())

                                      <li><a href="{{ route('posts.index') }}">Posts</a></li>
                                       <li><a href="{{ route('bibles.index') }}">Bs Reg</a></li>
                                       <li><a href="{{ route('users.index') }}">Users</a></li>
                                       <li><a href="{{ route('category.index') }}">Categories</a></li>

                                        <hr>
                                        @endif
                                        <li {{Request::is('logout')? "active" :""}}>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>


                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>

            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </div>
</nav>
