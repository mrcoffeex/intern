<?php  
    $navPage = str_replace('.php', '', basename($_SERVER['PHP_SELF']));

    function highlightNav($current, $value){

        if ($current == $value) {
            $res = "nav-link active";
        } else {
            $res = "";
        }
        
        return $res;
    }
?>

<header class="site-navbar mt-3">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="site-logo col-6"><a href="./">Intern<span class="text-primary">Builders</span></a></div>

            <nav class="mx-auto site-navigation">
                <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                    <li><a href="./" class="<?= highlightNav($navPage, "") . highlightNav($navPage, "index") ?>">Home</a></li>
                    <li><a href="about" class="<?= highlightNav($navPage, "about") ?>">About</a></li>
                    <li><a href="support" class="<?= highlightNav($navPage, "support") ?>">Support</a></li>
                    <li class=""><a href="#" data-toggle="modal"  data-target="#login">Log In</a></li>
                    <li class="has-children">
                        <a href="#">Register</a>
                        <ul class="dropdown">
                            <li><a href="student">Student</a></li>
                            <li><a href="business">Business</a></li>
                            <li><a href="school">School</a></li>
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