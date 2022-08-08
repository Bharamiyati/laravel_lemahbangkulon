<header id="header" class="header">

    <div class="header-menu">

        <div class="col-sm-7">
        </div>

        <div class="col-sm-5">
            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle" src="{{asset('images/logoadmin.jpg')}}" alt="User Avatar">
                </a>

                <div class="user-menu dropdown-menu">
                    <button class="btn btn-danger">
                        <a class="nav-link" style="color:white" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off" style="color: white;"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </button>
                </div>
            </div>

        </div>
    </div>

</header><!-- /header -->