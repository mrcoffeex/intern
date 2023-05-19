<header class="site-navbar mt-3">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="site-logo col-6"><a href="./">Intern<span class="text-primary">Builders</span></a></div>

            <nav class="mx-auto site-navigation">
                <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                    <li><a href="./" class="nav-link <?= setActive("index") ?>">Home</a></li>
                    <li><a href="internships" class="nav-link <?= setActive("internships") ?>">InternShips</a></li>
                    <li><a href="profile" class="nav-link <?= setActive("profile") ?>">Profile</a></li>
                    <li class="d-lg-none has-children">
                        <a href="#"><?= $userFullname ?></a>
                        <ul class="dropdown">
                            <li><a href="accountSettings">>Account Settings</a></li>
                            <li><a href="_logout">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            
            <div class="right-cta-menu text-right d-flex aligin-items-center col-6">

                <div class="ml-auto">
                    <div class="dropdown border-width-2 d-none d-lg-inline-block">
                        <button class="btn btn-outline-white dropdown-toggle" type="button" data-toggle="dropdown">
                            <?= $userFullname ?> <i class="icon-chevron-down"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <div class="dropdown-divider"></div>
                            <li><a href="accountSettings" class="text-decoration-none text-dark ml-3"><i class="icon-cogs"></i> Settings</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a href="logout" class="text-decoration-none text-dark ml-3"><i class="icon-sign-out"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>

                <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
            </div>
        </div>
    </div>
</header>