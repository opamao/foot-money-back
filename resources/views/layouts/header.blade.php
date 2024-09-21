<div id="page_top" class="section-body top_dark">
    <div class="container-fluid">
        <div class="page-header">
            <div class="left">
                <a href="javascript:void(0)" class="icon menu_toggle mr-3"><i class="fa  fa-align-left"></i></a>
                <h1 class="page-title">{{ $title }}</h1>
            </div>
            <div class="right">
                <div class="notification d-flex">
                    <div class="dropdown d-flex">
                        <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-2"
                            data-toggle="dropdown"><i class="fa fa-language"></i></a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="#"><img class="w20 mr-2"
                                    src="{{ asset('') }}assets/images/flags/bl.svg">France</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><img class="w20 mr-2"
                                    src="{{ asset('') }}assets/images/flags/us.svg">English</a>
                            <a class="dropdown-item" href="#"><img class="w20 mr-2"
                                    src="{{ asset('') }}assets/images/flags/es.svg">Spanish</a>
                        </div>
                    </div>
                    <div class="dropdown d-flex">
                        <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-2"
                            data-toggle="dropdown"><i class="fa fa-user"></i></a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="{{ url('profile') }}"><i
                                    class="dropdown-icon fe fe-user"></i>
                                Profil</a>
                            <a class="dropdown-item" href="{{ url('settings') }}"><i
                                    class="dropdown-icon fe fe-settings"></i> Paramètres</a>
                            <a class="dropdown-item" href="#"><i class="dropdown-icon fe fe-log-out"></i>
                                Se déconnecter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
