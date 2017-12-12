<div class="container">
    <div class="navbar-header">

        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('/manage') }}">
           Quản lý
        </a>
    </div>

    <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Left Side Of Navbar -->
        @auth
            <ul class="nav navbar-nav">
                <li  class="dropdown">
                   <a href="#"  data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">Sản phẩm</a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('pro-list') }}">
                                Danh sách
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pro-add') }}">
                                Thêm
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        @endauth
        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @auth
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li>
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
            @endauth
        </ul>
    </div>
</div>
