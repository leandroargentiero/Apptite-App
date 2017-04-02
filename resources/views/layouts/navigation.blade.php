<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Toggle navbaar for mobile -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand logo" href="/">Apptite</a>
        </div>

        <!-- Collect all content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li ><a href="" class="nav-btn upload">Maaltijd toevoegen</a></li>
                <li class="dropdown">
                    <a href="#" class="nav-btn-account dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="">Mijn account<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="">Mijn profiel</a></li>
                        <li><a href="">Mijn boekingen</a></li>
                        <li><a href="">Uitloggen</a></li>
                    </ul>
                </li>
                <li><a href="/auth/register" class="nav-register">Registreer</a></li>
                <li><a href="/auth/login" class="nav-login">Login</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>