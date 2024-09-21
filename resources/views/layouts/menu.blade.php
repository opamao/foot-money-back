<div id="header_top" class="header_top">
    <div class="container">
        <div class="hleft">
            <a class="header-brand" href="#"><i class="fa fa-soccer-ball-o brand-logo"></i></a>
        </div>
        <div class="hright">
            <div class="dropdown">
                <a href="javascript:void(0)" class="nav-link icon menu_toggle"><i class="fa  fa-align-left"></i></a>
            </div>
        </div>
    </div>
</div>
<div id="left-sidebar" class="sidebar ">
    <h5 class="brand-name">Foot Money <a href="javascript:void(0)" class="menu_option float-right"><i
                class="icon-grid font-16" data-toggle="tooltip" data-placement="left"
                title="Basculer entre Grille et Liste"></i></a></h5>
    <nav id="left-sidebar-nav" class="sidebar-nav">
        <ul class="metismenu">
            <li class="g_heading">Menus</li>
            <li class="{{ Request::is('index') ? 'active' : '' }}"><a href="{{ url('index') }}"><i class="fa fa-dashboard"></i><span>Tableau de
                        bord</span></a>
            </li>
            <li class="{{ Request::is('clubs') ? 'active' : '' }}{{ Request::is('details-clubs') ? 'active' : '' }}"><a href="{{ url('clubs') }}"><i class="fa fa-list-ol"></i><span>Clubs</span></a></li>
            <li class="{{ Request::is('matchs') ? 'active' : '' }}"><a href="{{ url('matchs') }}"><i class="fa fa-calendar-check-o"></i><span>Matchs</span></a></li>
            <li class="{{ Request::is('news') ? 'active' : '' }}"><a href="{{ url('news') }}"><i class="fa fa-list-ul"></i><span>Actualités</span></a></li>
            <li class="{{ Request::is('stades') ? 'active' : '' }}"><a href="{{ url('stades') }}"><i class="icon-tag"></i><span>Stades</span></a></li>
            <li class="{{ Request::is('users') ? 'active' : '' }}"><a href="{{ url('users') }}"><i class="fa fa-user"></i><span>Clients</span></a></li>
        </ul>
    </nav>
</div>
