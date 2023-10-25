<header class="site-navbar mt-3">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="site-logo col-6"><a href="./">Intern<span class="text-primary">Builders</span></a></div>

            <nav class="mx-auto site-navigation">
                <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                    <li><a href="./" class="nav-link <?= setActive("index") ?>">Home</a></li>
                    <li><a href="profile" class="nav-link <?= setActive("profile") ?>">Profile <?= $profileStatusAlert ?></a></li>
                    <li><a href="submissions" class="nav-link <?= setActive("submissions") ?>">Submissions <span class="badge badge-primary text-white"><?= countSubmissions($userCode) ?></span></a></li>
                    <li class="has-children">
                        <a href="#"><?= $userFullname ?></a>
                        <ul class="dropdown">
                            <li><a href="accountSettings">Settings</a></li>
                            <li><a href="logout">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            
            <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
                <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
            </div>
        </div>
    </div>
</header>