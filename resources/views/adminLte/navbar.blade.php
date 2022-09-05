<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
            <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('/home') }}" class="nav-link">Home</a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="{{asset('AdminLTE/dist/img/proMina.png')}}"
                     class="user-image" alt="User Image"/>

                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">Pro Mina</span>
            </a>
            <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                    <img src="{{asset('AdminLTE/dist/img/proMina.png')}}"
                         class="img-circle" alt="User Image"/>
                    <p>
                        Pro Mina
                    </p>
                </li>
                <!-- Menu Footer-->
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
