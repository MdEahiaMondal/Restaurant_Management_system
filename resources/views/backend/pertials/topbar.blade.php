<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <a onclick="event.preventDefault(), document.getElementById('logout-form').submit() " href="{{ route('logout') }}">
                    <i class="fa fa-sign-out"></i> Log out
                </a>

                <form action="{{ route('logout') }}" style="display: none" method="post" id="logout-form">
                    @csrf
                </form>

            </li>
            <li>
                <a class="right-sidebar-toggle">
                    <i class="fa fa-tasks"></i>
                </a>
            </li>
        </ul>

    </nav>

</div>
