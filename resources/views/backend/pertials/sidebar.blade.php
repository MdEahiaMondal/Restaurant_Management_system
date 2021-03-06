<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="{{ asset('backend/img/profile_small.jpg') }}" />
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>

            <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
            </li>

            <li class="{{ Request::is('admin/sliders*') ? 'active' : '' }}">
                <a href="{{ route('sliders.index') }}"><i class="fa fa-diamond"></i> <span class="nav-label">Slider</span></a>
            </li>

            <li class="{{ Request::is('admin/categories*') ? 'active' : '' }}">
                <a href="{{ route('categories.index') }}"><i class="fa fa-diamond"></i> <span class="nav-label">Category</span></a>
            </li>

            <li class="{{ Request::is('admin/items*') ? 'active' : '' }}">
                <a href="{{ route('items.index') }}"><i class="fa fa-diamond"></i> <span class="nav-label">Items</span></a>
            </li>

            <li class="{{ Request::is('admin/reservasions*') ? 'active' : '' }}">
                <a href="{{ route('reservasions.index') }}"><i class="fa fa-diamond"></i> <span class="nav-label">Reservation</span></a>
            </li>

            <li class="{{ Request::is('admin/contacts*') ? 'active' : '' }}">
                <a href="{{ route('contacts.index') }}"><i class="fa fa-diamond"></i> <span class="nav-label">Contact</span></a>
            </li>

        </ul>

    </div>
</nav>
