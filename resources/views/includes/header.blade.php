<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            @if(Auth::check())
                <a class="navbar-brand" href="{{ route('dashboard') }}">Dashboard</a>
            @endif
        </div>

        <ul class="nav navbar-nav navbar-right">
            @if(Auth::check())
                <li><a href="{{ route('account') }}">Account</a></li>
                <li><a href="{{ route('logout') }}">LogOut</a></li>
            @endif

        </ul>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>