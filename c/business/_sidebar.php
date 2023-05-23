<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="./">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="me">
                <i class="ti-briefcase menu-icon"></i>
                <span class="menu-title"><?= $userFullname ?></span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="posts">
                <i class="ti-view-list-alt menu-icon"></i>
                <span class="menu-title">Posts</span>
            </a>
        </li>

        <div class="dropdown-divider mt-3 mb-3"></div>

        <li class="nav-item">
            <a class="nav-link" href="support">
                <i class="ti-support menu-icon"></i>
                <span class="menu-title">Support</span>
            </a>
        </li>
    </ul>
</nav>